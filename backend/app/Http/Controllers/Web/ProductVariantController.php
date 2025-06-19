<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeType;
use Illuminate\Support\Facades\Storage;

class ProductVariantController extends Controller
{
    /**
     * Lấy danh sách biến thể cho một sản phẩm cụ thể.
     */
    public function index(Product $product)
    {
        $variants = $product->variants()->with('attributeValues.attributeType')->orderBy('variant_name')->get(); // Load attributeValues và attributeType
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
            'pricing_type' => 'required|in:public_price,request_quote',
            'quantity' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'attribute_value_ids' => 'nullable|array', // Mảng các ID giá trị thuộc tính
            'attribute_value_ids.*' => 'exists:product_attribute_values,id',
        ];

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

        $imgPath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products/variants', $image);
        }

        $variant = $product->variants()->create([
            'variant_name' => $request->variant_name,
            'sku' => $request->sku,
            'pricing_type' => $request->pricing_type,
            'price' => $request->pricing_type === 'public_price' ? $request->price : null,
            'discount_price' => $request->pricing_type === 'public_price' ? $request->discount_price : null,
            'discount_percent' => $request->pricing_type === 'public_price' ? $request->discount_percent : null,
            'quantity' => $request->quantity,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        // Đồng bộ các giá trị thuộc tính cho biến thể
        if ($request->has('attribute_value_ids')) {
            $variant->attributeValues()->sync($request->attribute_value_ids);
        } else {
            $variant->attributeValues()->detach();
        }

        return response()->json(['success' => 'Variant created successfully.', 'variants' => $product->variants()->with('attributeValues.attributeType')->orderBy('variant_name')->get()]);
    }

    /**
     * Lấy thông tin của một biến thể để chỉnh sửa.
     */
    public function edit(ProductVariant $productVariant)
    {
        $productVariant->load('attributeValues'); // Tải các giá trị thuộc tính hiện có của biến thể

        $attributeTypes = ProductAttributeType::with('values')->orderBy('name')->get(); // Lấy tất cả loại thuộc tính và giá trị của chúng

        return response()->json([
            'variant' => $productVariant,
            'attributeTypes' => $attributeTypes, // Gửi về để điền form
        ]);
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
            'attribute_value_ids' => 'nullable|array',
            'attribute_value_ids.*' => 'exists:product_attribute_values,id',
        ];

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
            'pricing_type' => $request->pricing_type,
            'price' => $request->pricing_type === 'public_price' ? $request->price : null,
            'discount_price' => $request->pricing_type === 'public_price' ? $request->discount_price : null,
            'discount_percent' => $request->pricing_type === 'public_price' ? $request->discount_percent : null,
            'quantity' => $request->quantity,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        // Đồng bộ các giá trị thuộc tính cho biến thể
        if ($request->has('attribute_value_ids')) {
            $productVariant->attributeValues()->sync($request->attribute_value_ids);
        } else {
            $productVariant->attributeValues()->detach();
        }

        return response()->json(['success' => 'Variant updated successfully.', 'variants' => $productVariant->product->variants()->with('attributeValues.attributeType')->orderBy('variant_name')->get()]);
    }

    /**
     * Xóa một biến thể.
     */
    public function destroy(ProductVariant $productVariant)
    {
        $productId = $productVariant->product_id;
        // Xóa mối quan hệ với attribute values trước khi xóa biến thể
        $productVariant->attributeValues()->detach();

        if ($productVariant->img && Storage::disk('public')->exists($productVariant->img)) {
            Storage::disk('public')->delete($productVariant->img);
        }
        $productVariant->delete();
        return response()->json(['success' => 'Variant deleted successfully.', 'variants' => Product::find($productId)->variants()->with('attributeValues.attributeType')->orderBy('variant_name')->get()]);
    }
}