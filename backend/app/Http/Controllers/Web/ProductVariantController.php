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
    public function index(Product $product)
    {
        $variants = $product->variants()->orderBy('variant_name')->get();
        return response()->json(['variants' => $variants]);
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'variant_name' => 'required|string|max:255',
            'sku' => ['nullable', 'string', 'max:255', Rule::unique('product_variants')],
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|lt:price|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products/variants', $image);
        }

        $variant = $product->variants()->create([
            'variant_name' => $request->variant_name,
            'sku' => $request->sku,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'discount_percent' => $request->discount_percent,
            'quantity' => $request->quantity,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        return response()->json(['success' => 'Variant created successfully.', 'variant' => $variant, 'variants' => $product->variants()->orderBy('variant_name')->get()]);
    }

    public function edit(ProductVariant $productVariant)
    {
        return response()->json(['variant' => $productVariant]);
    }

    public function update(Request $request, ProductVariant $productVariant)
    {
        $request->validate([
            'variant_name' => 'required|string|max:255',
            'sku' => ['nullable', 'string', 'max:255', Rule::unique('product_variants')->ignore($productVariant->id)],
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|lt:price|min:0',
            'discount_percent' => 'nullable|integer|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ]);

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
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'discount_percent' => $request->discount_percent,
            'quantity' => $request->quantity,
            'img' => $imgPath,
            'status' => $request->status ?? 1,
            'is_featured' => $request->is_featured ?? 0,
        ]);

        return response()->json(['success' => 'Variant updated successfully.', 'variant' => $productVariant, 'variants' => $productVariant->product->variants()->orderBy('variant_name')->get()]);
    }

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
