<?php

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// class ProductController extends Controller
// {
//     /**
//      * Hiển thị danh sách các sản phẩm.
//      */
//     public function index(Request $request)
//     {
//         // Load sản phẩm kèm theo category và tags của nó để hiển thị
//         $products = Product::with('category', 'tags')->orderBy('name')->get();

//         // Nếu request là AJAX, trả về JSON
//         if ($request->ajax()) {
//             return response()->json(['products' => $products]);
//         }
//         // dd($products);
//         // Nếu không phải AJAX, trả về view như bình thường
//         return view('apps.product.index', compact('products'));
//     }

//     /**
//      * Lưu một sản phẩm mới vào cơ sở dữ liệu.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'category_id' => 'required|exists:categories,id',
//             'description' => 'nullable|string',
//             'price' => 'required|numeric|min:0',
//             'discount_price' => 'nullable|numeric|lt:price|min:0',
//             'discount_percent' => 'nullable|integer|min:0|max:100',
//             'quantity' => 'required|integer|min:0',
//             'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'status' => 'boolean',
//             'is_featured' => 'boolean',
//             'tags' => 'nullable|array', // Mảng các tag ID được chọn
//             'tags.*' => 'exists:tags,id', // Mỗi tag ID phải tồn tại trong bảng tags
//         ]);

//         $slug = Str::slug($request->name);
//         $originalSlug = $slug;
//         $count = 1;
//         while (Product::where('slug', $slug)->exists()) {
//             $slug = $originalSlug . '-' . $count++;
//         }

//         $imgPath = null;
//         if ($request->hasFile('img')) {
//             $image = $request->file('img');
//             $imgPath = Storage::disk('public')->putFile('uploads/products', $image);
//         }

//         $product = Product::create([
//             'category_id' => $request->category_id,
//             'name' => $request->name,
//             'slug' => $slug,
//             'description' => $request->description,
//             'price' => $request->price,
//             'discount_price' => $request->discount_price,
//             'discount_percent' => $request->discount_percent,
//             'quantity' => $request->quantity,
//             'img' => $imgPath,
//             'status' => $request->status ?? 1,
//             'is_featured' => $request->is_featured ?? 0,
//             'views' => 0,
//             'sold' => 0,
//         ]);

//         // Gán (sync) tags cho sản phẩm.
//         // `sync()` sẽ tự động thêm các tag mới và xóa các tag không còn được chọn.
//         if ($request->has('tags')) {
//             $product->tags()->sync($request->tags);
//         } else {
//             $product->tags()->detach(); // Xóa tất cả tags nếu không có tag nào được chọn
//         }

//         return response()->json(['success' => 'Product created successfully.', 'products' => Product::with('category', 'tags')->orderBy('name')->get()]);
//     }

//     /**
//      * Lấy thông tin của một sản phẩm để chỉnh sửa.
//      */
//     public function edit($id)
//     {
//         // Load sản phẩm kèm theo category và tags của nó
//         $product = Product::with('tags')->find($id);
//         if (!$product) {
//             return response()->json(['error' => 'Product not found.'], 404);
//         }

//         $categories = Category::all(); // Lấy tất cả categories cho dropdown
//         $tags = Tag::all(); // Lấy tất cả tags cho checkbox/select

//         return response()->json([
//             'product' => $product,
//             'categories' => $categories,
//             'allTags' => $tags, // Đổi tên biến để rõ ràng hơn khi dùng trong JS
//         ]);
//     }

//     /**
//      * Cập nhật thông tin của một sản phẩm.
//      */
//     public function update(Request $request, $id)
//     {
//         $product = Product::find($id);
//         if (!$product) {
//             return response()->json(['error' => 'Product not found.'], 404);
//         }

//         $request->validate([
//             'name' => 'required|string|max:255',
//             'category_id' => 'required|exists:categories,id',
//             'description' => 'nullable|string',
//             'price' => 'required|numeric|min:0',
//             'discount_price' => 'nullable|numeric|lt:price|min:0',
//             'discount_percent' => 'nullable|integer|min:0|max:100',
//             'quantity' => 'required|integer|min:0',
//             'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'status' => 'boolean',
//             'is_featured' => 'boolean',
//             'tags' => 'nullable|array',
//             'tags.*' => 'exists:tags,id',
//         ]);

//         $slug = Str::slug($request->name);
//         $originalSlug = $slug;
//         $count = 1;
//         while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
//             $slug = $originalSlug . '-' . $count++;
//         }

//         $imgPath = $product->img;
//         if ($request->hasFile('img')) {
//             if ($imgPath && Storage::disk('public')->exists($imgPath)) {
//                 Storage::disk('public')->delete($imgPath);
//             }
//             $image = $request->file('img');
//             $imgPath = Storage::disk('public')->putFile('uploads/products', $image);
//         }

//         $product->update([
//             'category_id' => $request->category_id,
//             'name' => $request->name,
//             'slug' => $slug,
//             'description' => $request->description,
//             'price' => $request->price,
//             'discount_price' => $request->discount_price,
//             'discount_percent' => $request->discount_percent,
//             'quantity' => $request->quantity,
//             'img' => $imgPath,
//             'status' => $request->status ?? 1,
//             'is_featured' => $request->is_featured ?? 0,
//         ]);

//         // Đồng bộ tags cho sản phẩm
//         if ($request->has('tags')) {
//             $product->tags()->sync($request->tags);
//         } else {
//             $product->tags()->detach(); // Xóa tất cả tags nếu không có tag nào được chọn
//         }

//         return response()->json(['success' => 'Product updated successfully.', 'products' => Product::with('category', 'tags')->orderBy('name')->get()]);
//     }

//     /**
//      * Xóa một sản phẩm khỏi cơ sở dữ liệu.
//      */
//     public function destroy($id)
//     {
//         $product = Product::find($id);
//         if (!$product) {
//             return response()->json(['error' => 'Product not found.'], 404);
//         }

//         // Xóa các mối quan hệ tags trong bảng pivot trước khi xóa sản phẩm
//         $product->tags()->detach();

//         if ($product->img && Storage::disk('public')->exists($product->img)) {
//             Storage::disk('public')->delete($product->img);
//         }

//         $product->delete(); // Sử dụng soft delete nếu model có trait SoftDeletes

//         return response()->json(['success' => 'Product deleted successfully.', 'products' => Product::with('category', 'tags')->orderBy('name')->get()]);
//     }
// }

class ProductController extends Controller
{
    // Hàm trợ giúp để lấy cây danh mục (không đổi)
    private function getCategoriesTreeForView($parentId = null, $level = 0)
    {
        $categories = Category::where('parent_id', $parentId)
                               ->with('parent')
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
        // Load sản phẩm kèm theo CÁC categories, tags và variants của nó
        // categories.parent để lấy cả danh mục cha của các danh mục được gán
        $products = Product::with('categories.parent', 'tags', 'variants')->orderBy('name')->get();

        if ($request->ajax()) {
            return response()->json(['products' => $products]);
        }

        return view('apps.product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_ids' => 'required|array', // Bây giờ nhận một MẢNG các ID danh mục
            'category_ids.*' => 'exists:categories,id',
            'description' => 'nullable|string',
            // Các trường giá, số lượng, v.v. không còn ở đây
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',

            // Validation cho các trường chung của Product mà chúng ta giữ lại
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imgPath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products/general', $image);
        }

        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            // Các trường chung còn lại:
            'views' => 0,
            'sold' => 0,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        // Đồng bộ categories cho sản phẩm
        if ($request->has('category_ids')) {
            $product->categories()->sync($request->category_ids);
        } else {
            $product->categories()->detach();
        }

        // Đồng bộ tags cho sản phẩm
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->detach();
        }

        return response()->json(['success' => 'Product created successfully.', 'products' => Product::with('categories.parent', 'tags', 'variants')->orderBy('name')->get()]);
    }

    public function edit($id)
    {
        // Load sản phẩm kèm theo CÁC category, tags và variants của nó
        $product = Product::with('categories', 'tags', 'variants')->find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $categoriesTree = $this->getCategoriesTreeForView();
        $tags = Tag::all();

        $productCategoryIds = $product->categories->pluck('id')->toArray();
        $productTagIds = $product->tags->pluck('id')->toArray();

        return response()->json([
            'product' => $product,
            'categoriesTree' => $categoriesTree,
            'allTags' => $tags,
            'productCategoryIds' => $productCategoryIds,
            'productTagIds' => $productTagIds,
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
            // Các trường giá, số lượng không còn ở đây
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',

            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        // Đồng bộ categories cho sản phẩm
        if ($request->has('category_ids')) {
            $product->categories()->sync($request->category_ids);
        } else {
            $product->categories()->detach();
        }

        // Đồng bộ tags cho sản phẩm
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->detach();
        }

        return response()->json(['success' => 'Product updated successfully.', 'products' => Product::with('categories.parent', 'tags', 'variants')->orderBy('name')->get()]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        // Xóa các mối quan hệ nhiều-nhiều trước
        $product->categories()->detach();
        $product->tags()->detach();
        
        // Product variants và images sẽ được xóa tự động nhờ onDelete('cascade')
        // trong các migration của product_variants và product_images.

        // Xóa ảnh đại diện chung của sản phẩm
        if ($product->img && Storage::disk('public')->exists($product->img)) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete(); // Thực hiện soft delete

        return response()->json(['success' => 'Product deleted successfully.', 'products' => Product::with('categories.parent', 'tags', 'variants')->orderBy('name')->get()]);
    }
}