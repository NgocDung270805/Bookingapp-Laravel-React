<?php

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Hiển thị danh sách các sản phẩm.
     */
    public function index(Request $request)
    {
        // Load sản phẩm kèm theo category và tags của nó để hiển thị
        $products = Product::with('category', 'tags')->orderBy('name')->get();

        // Nếu request là AJAX, trả về JSON
        if ($request->ajax()) {
            return response()->json(['products' => $products]);
        }
        // dd($products);
        // Nếu không phải AJAX, trả về view như bình thường
        return view('apps.product.index', compact('products'));
    }

    /**
     * Lưu một sản phẩm mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|lt:price|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'tags' => 'nullable|array', // Mảng các tag ID được chọn
            'tags.*' => 'exists:tags,id', // Mỗi tag ID phải tồn tại trong bảng tags
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
            $imgPath = Storage::disk('public')->putFile('uploads/products', $image);
        }

        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'discount_percent' => $request->discount_percent,
            'quantity' => $request->quantity,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
            'views' => 0,
            'sold' => 0,
        ]);

        // Gán (sync) tags cho sản phẩm.
        // `sync()` sẽ tự động thêm các tag mới và xóa các tag không còn được chọn.
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->detach(); // Xóa tất cả tags nếu không có tag nào được chọn
        }

        return response()->json(['success' => 'Product created successfully.', 'products' => Product::with('category', 'tags')->orderBy('name')->get()]);
    }

    /**
     * Lấy thông tin của một sản phẩm để chỉnh sửa.
     */
    public function edit($id)
    {
        // Load sản phẩm kèm theo category và tags của nó
        $product = Product::with('tags')->find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $categories = Category::all(); // Lấy tất cả categories cho dropdown
        $tags = Tag::all(); // Lấy tất cả tags cho checkbox/select

        return response()->json([
            'product' => $product,
            'categories' => $categories,
            'allTags' => $tags, // Đổi tên biến để rõ ràng hơn khi dùng trong JS
        ]);
    }

    /**
     * Cập nhật thông tin của một sản phẩm.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|lt:price|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
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
            $imgPath = Storage::disk('public')->putFile('uploads/products', $image);
        }

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'discount_percent' => $request->discount_percent,
            'quantity' => $request->quantity,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        // Đồng bộ tags cho sản phẩm
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->detach(); // Xóa tất cả tags nếu không có tag nào được chọn
        }

        return response()->json(['success' => 'Product updated successfully.', 'products' => Product::with('category', 'tags')->orderBy('name')->get()]);
    }

    /**
     * Xóa một sản phẩm khỏi cơ sở dữ liệu.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        // Xóa các mối quan hệ tags trong bảng pivot trước khi xóa sản phẩm
        $product->tags()->detach();

        if ($product->img && Storage::disk('public')->exists($product->img)) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete(); // Sử dụng soft delete nếu model có trait SoftDeletes

        return response()->json(['success' => 'Product deleted successfully.', 'products' => Product::with('category', 'tags')->orderBy('name')->get()]);
    }
}
