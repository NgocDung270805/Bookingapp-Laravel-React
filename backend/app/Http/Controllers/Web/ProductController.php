<?php

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeType;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private function getCategoriesTreeForView($parentId = null, $level = 0)
    {
        $categories = Category::where('parent_id', $parentId)
            ->orderBy('name')
            ->get();

        $tree = [];
        foreach ($categories as $category) {
            $category->level = $level;
            $tree[] = $category;
            $children = $this->getCategoriesTreeForView($category->id, $level + 1);
            $tree = array_merge($tree, $children);
        }
        return $tree;
    }

    public function index(Request $request)
    {
        // Eager load categories, tags, and variants for products
        $products = Product::with('categories', 'tags', 'variants')->orderBy('name')->get();

        if ($request->ajax()) {
            return response()->json(['products' => $products]);
        }
        return view('apps.product.index', compact('products'));
    }

    public function store(Request $request)
    {
        Log::info('Store method called with:', ['method' => $request->method(), 'all_data' => $request->all()]);

        Log::info('Request method:', ['method' => $request->method()]);
        Log::info('Request path:', ['path' => $request->path()]);
        Log::info('Route:', ['route' => $request->route()->getName()]);

        // 1. Validation: Đảm bảo các trường NO NULL được gửi lên
        // Đặc biệt là 'name' và 'status'.
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_ids' => 'nullable',
            'category_ids.*' => 'nullable',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation cho multiple images
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi ký tự.',
            'tags.*.exists' => 'Tag không hợp lệ.',
            'img.image' => 'Ảnh chính phải là một file ảnh hợp lệ.',
            'images.*.image' => 'Mỗi ảnh phụ phải là một file ảnh hợp lệ.',
            'status.boolean' => 'Trạng thái không hợp lệ.',
            'is_featured.boolean' => 'Nổi bật không hợp lệ.',
        ]);

        // 2. Xử lý dữ liệu trước khi tạo (QUAN TRỌNG NHẤT)
        $dataToCreate = $validatedData;

        // 🌟 A. Xử lý SLUG (NO NULL trong DB) 🌟
        // Đây là nguyên nhân CHÍNH gây lỗi 422 nếu bạn không tạo nó.
        $dataToCreate['slug'] = Str::slug($dataToCreate['name']);

        // 🌟 B. Xử lý STATUS (NO NULL trong DB) 🌟
        // Đảm bảo status là 0 nếu không được gửi (unchecked checkbox)
        $dataToCreate['status'] = $request->has('status') ? $request->input('status') : 0;
        $dataToCreate['is_featured'] = $request->has('is_featured') ? $request->input('is_featured') : 0;

        // Loại bỏ các trường liên quan đến quan hệ (nếu cần)
        unset($dataToCreate['category_ids'], $dataToCreate['tags']);

        // 3. Tạo Product
        $product = Product::create($dataToCreate);

        // 4. Xử lý ảnh chính (img)
        if ($request->hasFile('img')) {
            // Lưu trữ file và cập nhật đường dẫn vào DB
            $product->img = $request->file('img')->store('products', 'public');
            $product->save();
        }

        // 5. Xử lý ảnh phụ (images)
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('products/gallery', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }

        // 6. Đồng bộ Tags và Categories
        if ($request->has('tags')) {
            $product->tags()->sync($request->input('tags'));
        }
        if ($request->has('category_ids')) {
            $product->categories()->sync($request->input('category_ids'));
        }

        // 7. Trả về thành công
        return response()->json([
            'success' => 'Sản phẩm đã được tạo. Đang mở quản lý biến thể.',
            'product' => $product->load(['images', 'categories', 'tags']),
            'product_id' => $product->id, // Trả về ID để frontend biết và mở modal biến thể
        ], 200); // Sử dụng mã 200 OK cho POST thành công
    }

    public function edit($id)
    {
        // Eager load categories, tags, and variants for the product being edited
        $product = Product::with(['categories', 'tags', 'variants', 'images'])->find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        Log::info('Loading product for edit:', [
            'product_id' => $id,
            'images_count' => $product->images->count(),
            'images' => $product->images->toArray()
        ]);

        $categoriesTree = $this->getCategoriesTreeForView();
        $tags = Tag::all();
        $attributeTypes = ProductAttributeType::with('values')->orderBy('name')->get(); // Load all attribute types with their values

        $productCategoryIds = $product->categories->pluck('id')->toArray();
        $productTagIds = $product->tags->pluck('id')->toArray();

        return response()->json([
            'product' => $product,
            'categoriesTree' => $categoriesTree,
            'allTags' => $tags,
            'productCategoryIds' => $productCategoryIds,
            'productTagIds' => $productTagIds,
            'attributeTypes' => $attributeTypes, // Pass attribute types to the view
        ]);
    }

    public function update(Request $request, $id)
    {
        Log::info('Product update request:', [
            'id' => $id,
            'method' => $request->method(),
            'data' => $request->all()
        ]);

        // Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'string|max:255|unique:products,slug,' . $id,
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deleted_image_ids' => 'nullable|array',
            'deleted_image_ids.*' => 'exists:product_images,id',
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ], [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'name.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

            'slug.string' => 'Mã sản phẩm phải là chuỗi ký tự.',
            'slug.max' => 'Mã sản phẩm không được vượt quá 255 ký tự.',
            'slug.unique' => 'Mã sản phẩm đã tồn tại, vui lòng dùng tên khác.',

            'category_ids.array' => 'Danh mục không hợp lệ.',
            'category_ids.*.exists' => 'Danh mục không hợp lệ.',

            'description.string' => 'Mô tả phải là chuỗi ký tự.',

            'tags.array' => 'Tags không hợp lệ.',
            'tags.*.exists' => 'Tag không hợp lệ.',

            'img.image' => 'Ảnh chính phải là một file ảnh hợp lệ.',
            'img.mimes' => 'Ảnh chính phải có định dạng: jpeg, png, jpg, gif, svg.',
            'img.max' => 'Ảnh chính không được vượt quá 2048 KB.',
            'images.*.image' => 'Mỗi ảnh phụ phải là một file ảnh hợp lệ.',
            'images.*.mimes' => 'Ảnh phụ phải có định dạng: jpeg, png, jpg, gif, svg.',
            'images.*.max' => 'Ảnh phụ không được vượt quá 2048 KB.',

            'status.boolean' => 'Trạng thái không hợp lệ.',
            'is_featured.boolean' => 'Nổi bật không hợp lệ.',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::find($id);
            if (!$product) {
                throw new \Exception('San phẩm không tồn tại.');
            }

            // Generate unique slug for both new and existing names
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;

            while (Product::where('slug', $slug)
                ->where('id', '!=', $id)
                ->exists()
            ) {
                $slug = $originalSlug . '-' . $count++;
            }
            Log::info('Generated slug:', ['product_id' => $id, 'old_slug' => $product->slug, 'new_slug' => $slug]);

            // Handle main image
            $imgPath = $product->img;
            if ($request->hasFile('img')) {
                if ($imgPath && Storage::disk('public')->exists($imgPath)) {
                    Storage::disk('public')->delete($imgPath);
                }
                $imgPath = $request->file('img')->store('uploads/products/general', 'public');
            }

            // Update product
            $product->update([
                'name' => $request->name,
                'slug' => $slug,
                'description' => $request->description,
                'img' => $imgPath,
                'status' => $request->status ?? 1,
                'is_featured' => $request->is_featured ?? 0,
            ]);

            // Sync categories & tags
            $product->categories()->sync($request->category_ids ?? []);
            $product->tags()->sync($request->tags ?? []);

            // Handle gallery images
            if ($request->hasFile('images')) {
                $maxSortOrder = $product->images()->max('sort_order') ?? 0;
                foreach ($request->file('images') as $index => $image) {
                    $imagePath = $image->store('uploads/products', 'public');
                    $product->images()->create([
                        'image_path' => $imagePath,
                        'is_main_gallery_image' => false,
                        'sort_order' => $maxSortOrder + $index + 1,
                    ]);
                }
            }

            // Delete images if requested
            if (!empty($request->deleted_image_ids)) {
                $imagesToDelete = $product->images()->whereIn('id', $request->deleted_image_ids)->get();
                foreach ($imagesToDelete as $image) {
                    if (Storage::disk('public')->exists($image->image_path)) {
                        Storage::disk('public')->delete($image->image_path);
                    }
                    $image->delete();
                }
            }

            DB::commit();

            // Reload
            $product->load(['categories', 'tags', 'variants', 'images']);
            $products = Product::with(['categories', 'tags', 'variants', 'images'])
                ->orderBy('name')
                ->get();

            return response()->json([
                'success' => 'Update Sản phẩm thành công.',
                'product' => $product,
                'products' => $products
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating product:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Cập nhật sản phẩm thất bại.'], 500);
        }
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Sản phẩm không tồn tại.'], 404);
        }

        $product->categories()->detach();
        $product->tags()->detach();
        // Biến thể và ảnh sẽ được xóa thông qua cascade on delete từ migrations.

        if ($product->img && Storage::disk('public')->exists($product->img)) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete(); // Soft delete

        return response()->json(['success' => 'Xóa sản phẩm thành công.', 'products' => Product::with('categories', 'tags', 'variants')->orderBy('name')->get()]);
    }
}
