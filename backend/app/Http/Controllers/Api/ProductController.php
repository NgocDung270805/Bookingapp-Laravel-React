<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with([
            'categories',
            'tags',
            'variants.attributeValues.attributeType',
            'attributeValueConfigs.attributeValue.attributeType'
        ]);

        // Thêm logic tìm kiếm nếu có query param 'q' hoặc 'name'
        if ($request->has('q') && !empty($request->q)) {
            $searchQuery = $request->q;
            $query->where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('description', 'like', '%' . $searchQuery . '%');
        }

        $products = $query->orderBy('id')->get();

        return response()->json(['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,id',
        ];

        $validatedData = $request->validate($rules);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products', $image);
        }

        $product = Product::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'img' => $imgPath,
            'status' => $validatedData['status'] ?? 1,
            'is_featured' => $validatedData['is_featured'] ?? 0,
        ]);

        if (isset($validatedData['category_ids'])) {
            $product->categories()->sync($validatedData['category_ids']);
        } else {
            $product->categories()->detach();
        }

        if (isset($validatedData['tag_ids'])) {
            $product->tags()->sync($validatedData['tag_ids']);
        } else {
            $product->tags()->detach();
        }

        // Tải lại sản phẩm với các mối quan hệ để trả về response đầy đủ
        $product->load(['categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs.attributeValue.attributeType']);
        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs.attributeValue.attributeType']);
        return response()->json(['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($product->id)],
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,id',
        ];

        $validatedData = $request->validate($rules);

        $imgPath = $product->img;
        if ($request->hasFile('img')) {
            if ($imgPath && Storage::disk('public')->exists($imgPath)) {
                Storage::disk('public')->delete($imgPath);
            }
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products', $image);
        }

        $product->update([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'img' => $imgPath,
            'status' => $validatedData['status'] ?? 1,
            'is_featured' => $validatedData['is_featured'] ?? 0,
        ]);

        if (isset($validatedData['category_ids'])) {
            $product->categories()->sync($validatedData['category_ids']);
        } else {
            $product->categories()->detach();
        }

        if (isset($validatedData['tag_ids'])) {
            $product->tags()->sync($validatedData['tag_ids']);
        } else {
            $product->tags()->detach();
        }

        $product->load(['categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs.attributeValue.attributeType']);
        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Xóa các mối quan hệ trước khi xóa sản phẩm chính
        $product->categories()->detach();
        $product->tags()->detach();

        // Xóa variants và images liên quan (đảm bảo các mối quan hệ cascade delete hoặc xử lý thủ công)
        // Nếu bạn đã cấu hình cascade on delete ở DB hoặc trong model, có thể không cần detach/delete thủ công.
        // Tuy nhiên, việc detach Many-to-Many thì luôn cần.
        $product->variants()->delete(); // Xóa tất cả variants của sản phẩm này
        $product->images()->delete(); // Xóa tất cả images của sản phẩm này
        $product->attributeValueConfigs()->delete(); // Xóa tất cả configs thuộc tính của sản phẩm này

        if ($product->img && Storage::disk('public')->exists($product->img)) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
