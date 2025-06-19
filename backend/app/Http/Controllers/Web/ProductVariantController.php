<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductVariantController extends Controller
{
    /**
     * Lấy danh sách biến thể cho một sản phẩm cụ thể.
     */
    public function index(Product $product)
    {
        $variants = $product->variants()->orderBy('variant_name')->get();
        return response()->json(['variants' => $variants]);
    }

    /**
     * Lưu một biến thể mới cho sản phẩm.
     */
    public function store(Request $request, Product $product)
    {
        $rules = [
            'variant_name' => 'required|string|max:255',
            'sku' => ['nullable', 'string', 'max:255', Rule::unique('product_variants')],
            'pricing_type' => 'required|in:public_price,request_quote', // Validation cho trường mới
            'quantity' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ];

        // Thêm rules phụ thuộc vào pricing_type
        if ($request->pricing_type === 'public_price') {
            $rules['price'] = 'required|numeric|min:0';
            $rules['discount_price'] = 'nullable|numeric|lt:price|min:0';
            $rules['discount_percent'] = 'nullable|integer|min:0|max:100';
        } else {
            // Nếu là request_quote, các trường giá không bắt buộc
            $rules['price'] = 'nullable|numeric|min:0';
            $rules['discount_price'] = 'nullable|numeric|min:0';
            $rules['discount_percent'] = 'nullable|integer|min:0|max:100';
        }

        $request->validate($rules);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products/variants', $image);
        }

        $variant = $product->variants()->create([
            'variant_name' => $request->variant_name,
            'sku' => $request->sku,
            'pricing_type' => $request->pricing_type, // Lưu trường mới
            'price' => $request->pricing_type === 'public_price' ? $request->price : null, // Lưu null nếu là báo giá
            'discount_price' => $request->pricing_type === 'public_price' ? $request->discount_price : null,
            'discount_percent' => $request->pricing_type === 'public_price' ? $request->discount_percent : null,
            'quantity' => $request->quantity,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        return response()->json(['success' => 'Variant created successfully.', 'variant' => $variant, 'variants' => $product->variants()->orderBy('variant_name')->get()]);
    }

    /**
     * Lấy thông tin của một biến thể để chỉnh sửa.
     */
    public function edit(ProductVariant $productVariant)
    {
        return response()->json(['variant' => $productVariant]);
    }

    /**
     * Cập nhật thông tin của một biến thể.
     */
    public function update(Request $request, ProductVariant $productVariant)
    {
        $rules = [
            'variant_name' => 'required|string|max:255',
            'sku' => ['nullable', 'string', 'max:255', Rule::unique('product_variants')->ignore($productVariant->id)],
            'pricing_type' => 'required|in:public_price,request_quote',
            'quantity' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ];

        // Thêm rules phụ thuộc vào pricing_type
        if ($request->pricing_type === 'public_price') {
            $rules['price'] = 'required|numeric|min:0';
            $rules['discount_price'] = 'nullable|numeric|lt:price|min:0';
            $rules['discount_percent'] = 'nullable|integer|min:0|max:100';
        } else {
            $rules['price'] = 'nullable|numeric|min:0';
            $rules['discount_price'] = 'nullable|numeric|min:0';
            $rules['discount_percent'] = 'nullable|integer|min:0|max:100';
        }

        $request->validate($rules);

        $imgPath = $productVariant->img;
        if ($request->hasFile('img')) {
            if ($imgPath && Storage::disk('public')->exists($imgPath)) {
                Storage::disk('public')->delete($imgPath);
            }
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products/variants', $image);
        }

        $productVariant->update([
            'variant_name' => $request->variant_name,
            'sku' => $request->sku,
            'pricing_type' => $request->pricing_type, // Cập nhật trường mới
            'price' => $request->pricing_type === 'public_price' ? $request->price : null,
            'discount_price' => $request->pricing_type === 'public_price' ? $request->discount_price : null,
            'discount_percent' => $request->pricing_type === 'public_price' ? $request->discount_percent : null,
            'quantity' => $request->quantity,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        return response()->json(['success' => 'Variant updated successfully.', 'variant' => $productVariant, 'variants' => $productVariant->product->variants()->orderBy('variant_name')->get()]);
    }

    /**
     * Xóa một biến thể.
     */
    public function destroy(ProductVariant $productVariant)
    {
        $productId = $productVariant->product_id;
        if ($productVariant->img && Storage::disk('public')->exists($productVariant->img)) {
            Storage::disk('public')->delete($productVariant->img);
        }
        $productVariant->delete();
        return response()->json(['success' => 'Variant deleted successfully.', 'variants' => Product::find($productId)->variants()->orderBy('variant_name')->get()]);
    }
}