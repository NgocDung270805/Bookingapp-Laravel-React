<?php

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
        // 1. Validation: Đảm bảo các trường NO NULL được gửi lên
        // Đặc biệt là 'name' và 'status'.
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_ids' => 'array',
            'category_ids.*' => 'integer|exists:categories,id|distinct',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation cho multiple images
            'status' => 'boolean',
            'is_featured' => 'boolean',
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
        ], 201); // Sử dụng mã 201 Created cho POST thành công
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
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_ids' => 'required|array',
            'category_ids.*' => 'exists:categories,id',
            'description' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'deleted_image_ids' => 'nullable|array',
            'deleted_image_ids.*' => 'exists:product_images,id',
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imgPath = $product->img;
        if ($request->hasFile('img')) {
            if ($imgPath && Storage::disk('public')->exists($imgPath)) {
                Storage::disk('public')->delete($imgPath);
            }
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products/general', $image);
        }

        $product->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        if ($request->has('category_ids')) {
            $product->categories()->sync($request->category_ids);
        } else {
            $product->categories()->detach();
        }

        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->detach();
        }

        // Handle additional images
        if ($request->hasFile('images')) {
            Log::info('Starting image upload in update method');
            Log::info('Number of images received: ' . count($request->file('images')));

            // Get max sort_order
            $maxSortOrder = $product->images()->max('sort_order') ?? 0;
            Log::info('Current max sort order: ' . $maxSortOrder);

            foreach ($request->file('images') as $index => $image) {
                Log::info('Processing image ' . ($index + 1));
                $imagePath = Storage::disk('public')->putFile('uploads/products', $image);
                Log::info('Image saved at: ' . $imagePath);

                $imageRecord = $product->images()->create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                    'is_main_gallery_image' => false,
                    'sort_order' => $maxSortOrder + $index + 1
                ]);
                Log::info('Image record created:', $imageRecord->toArray());
            }
        } else {
            Log::info('No new images in update request');
        }

        // Delete images if requested
        if (!empty($request->deleted_image_ids)) {
            Log::info('Deleting images:', ['image_ids' => $request->deleted_image_ids]);
            $imagesToDelete = $product->images()->whereIn('id', $request->deleted_image_ids)->get();
            foreach ($imagesToDelete as $image) {
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                    Log::info('Deleted file: ' . $image->image_path);
                }
                $image->delete();
                Log::info('Deleted image record:', $image->toArray());
            }
        }

        // Reload the product with fresh relationships
        $product->load('categories', 'tags', 'variants', 'images');

        Log::info('Updated product details:', [
            'product_id' => $product->id,
            'images_count' => $product->images->count(),
            'images' => $product->images->toArray()
        ]);

        // Get all products with relationships for table update
        $products = Product::with(['categories', 'tags', 'variants', 'images'])
            ->orderBy('name')
            ->get();

        Log::info('Returning products list with count:', ['total' => $products->count()]);

        return response()->json([
            'success' => 'Product updated successfully.',
            'product' => $product,
            'products' => $products
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $product->categories()->detach();
        $product->tags()->detach();
        // Variants and Images will be deleted via cascade on delete from migrations.

        if ($product->img && Storage::disk('public')->exists($product->img)) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete(); // Soft delete

        return response()->json(['success' => 'Product deleted successfully.', 'products' => Product::with('categories', 'tags', 'variants')->orderBy('name')->get()]);
    }
}
