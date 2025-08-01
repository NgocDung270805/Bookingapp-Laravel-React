<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeType;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductAttributeValueConfig;

class ProductVariantController extends Controller
{
    /**
     * Lấy danh sách biến thể cho một sản phẩm cụ thể.
     */
    public function index(Product $product)
    {
        // Loại bỏ 'attributeValueConfigs' khỏi eager load của ProductVariant
        $variants = $product->variants()->with('attributeValues.attributeType')->orderBy('variant_name')->get();
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
            'attribute_value_ids' => 'nullable|array',
            'attribute_value_ids.*' => 'exists:product_attribute_values,id',
            'attribute_value_configs' => 'nullable|array',
            'attribute_value_configs.*.product_attribute_value_id' => 'required|exists:product_attribute_values,id',
            'attribute_value_configs.*.price' => 'nullable|numeric|min:0',
            'attribute_value_configs.*.discount_price' => 'nullable|numeric|min:0',
            'attribute_value_configs.*.discount_percent' => 'nullable|integer|min:0|max:100',
            'attribute_value_configs.*.quantity' => 'nullable|integer|min:0',
            'attribute_value_configs.*.image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attribute_value_configs.*.current_image_path' => 'nullable|string|max:255',
            'attribute_value_configs.*.is_active' => 'boolean',
            'attribute_value_configs.*.is_featured' => 'boolean',
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

        $validatedData = $request->validate($rules);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products/variants', $image);
        }

        $variant = $product->variants()->create([
            'variant_name' => $validatedData['variant_name'],
            'sku' => $validatedData['sku'],
            'pricing_type' => $validatedData['pricing_type'],
            'price' => $validatedData['pricing_type'] === 'public_price' ? ($validatedData['price'] ?? null) : null,
            'discount_price' => $validatedData['pricing_type'] === 'public_price' ? ($validatedData['discount_price'] ?? null) : null,
            'discount_percent' => $validatedData['pricing_type'] === 'public_price' ? ($validatedData['discount_percent'] ?? null) : null,
            'quantity' => $validatedData['quantity'],
            'img' => $imgPath,
            'status' => $validatedData['status'] ?? 1,
            'is_featured' => $validatedData['is_featured'] ?? 0,
        ]);

        // Sửa đổi: Sử dụng attach() thay vì sync() cho lần tạo đầu tiên
        // vì sync() sẽ xóa các bản ghi hiện có nếu không được cung cấp.
        // Khi tạo mới, chúng ta chỉ cần thêm các liên kết mới.
        if (isset($validatedData['attribute_value_ids'])) {
            $variant->attributeValues()->attach($validatedData['attribute_value_ids']);
        } else {
            // Nếu không có attribute_value_ids nào được gửi, đảm bảo không có liên kết nào được tạo
            $variant->attributeValues()->detach(); // Hoặc bỏ qua dòng này nếu không muốn detach khi tạo mới
        }

        if (isset($validatedData['attribute_value_configs']) && is_array($validatedData['attribute_value_configs'])) {
            foreach ($validatedData['attribute_value_configs'] as $configData) {
                $configImgPath = $configData['current_image_path'] ?? null;

                if (isset($configData['image_file']) && $configData['image_file']) {
                    if ($configImgPath && Storage::disk('public')->exists($configImgPath)) {
                        Storage::disk('public')->delete($configImgPath);
                    }
                    $configImgPath = Storage::disk('public')->putFile('uploads/attribute_configs', $configData['image_file']);
                }

                ProductAttributeValueConfig::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'product_attribute_value_id' => $configData['product_attribute_value_id']
                    ],
                    [
                        'price' => $configData['price'] ?? null,
                        'discount_price' => $configData['discount_price'] ?? null,
                        'discount_percent' => $configData['discount_percent'] ?? null,
                        'quantity' => $configData['quantity'] ?? 0,
                        'img_path' => $configImgPath,
                        'is_active' => $configData['is_active'] ?? 1,
                        'is_featured' => $configData['is_featured'] ?? 0,
                    ]
                );
            }
            $submittedConfigValueIds = collect($validatedData['attribute_value_configs'])->pluck('product_attribute_value_id')->toArray();
            ProductAttributeValueConfig::where('product_id', $product->id)
                ->whereNotIn('product_attribute_value_id', $submittedConfigValueIds)
                ->delete();
        } else {
            ProductAttributeValueConfig::where('product_id', $product->id)->delete();
        }

        // Tải lại products với các mối quan hệ cần thiết.
        // attributeValueConfigs được load trực tiếp từ Product model.
        $products = Product::with('categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs')->get();
        return response()->json(['success' => 'Variant created successfully.', 'products' => $products]);
    }

    /**
     * Lấy thông tin của một biến thể để chỉnh sửa.
     */
    public function edit(ProductVariant $productVariant)
    {
        $productVariant->load('attributeValues');

        $attributeValueConfigs = ProductAttributeValueConfig::where('product_id', $productVariant->product_id)->get();

        $attributeTypes = ProductAttributeType::with('values')->orderBy('name')->get();

        $selectedAttributeValueIds = $productVariant->attributeValues->pluck('id')->toArray();

        return response()->json([
            'variant' => $productVariant,
            'attributeTypes' => $attributeTypes,
            'selectedAttributeValueIds' => $selectedAttributeValueIds,
            'attributeValueConfigs' => $attributeValueConfigs,
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
            'attribute_value_configs' => 'nullable|array',
            'attribute_value_configs.*.product_attribute_value_id' => 'required|exists:product_attribute_values,id',
            'attribute_value_configs.*.price' => 'nullable|numeric|min:0',
            'attribute_value_configs.*.discount_price' => 'nullable|numeric|min:0',
            'attribute_value_configs.*.discount_percent' => 'nullable|integer|min:0|max:100',
            'attribute_value_configs.*.quantity' => 'nullable|integer|min:0',
            'attribute_value_configs.*.image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attribute_value_configs.*.current_image_path' => 'nullable|string|max:255',
            'attribute_value_configs.*.is_active' => 'boolean',
            'attribute_value_configs.*.is_featured' => 'boolean',
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

        $validatedData = $request->validate($rules);

        $imgPath = $productVariant->img;
        if ($request->hasFile('img')) {
            if ($imgPath && Storage::disk('public')->exists($imgPath)) {
                Storage::disk('public')->delete($imgPath);
            }
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products/variants', $image);
        }

        $productVariant->update([
            'variant_name' => $validatedData['variant_name'],
            'sku' => $validatedData['sku'],
            'pricing_type' => $validatedData['pricing_type'],
            'price' => $validatedData['pricing_type'] === 'public_price' ? ($validatedData['price'] ?? null) : null,
            'discount_price' => $validatedData['pricing_type'] === 'public_price' ? ($validatedData['discount_price'] ?? null) : null,
            'discount_percent' => $validatedData['pricing_type'] === 'public_price' ? ($validatedData['discount_percent'] ?? null) : null,
            'quantity' => $validatedData['quantity'],
            'img' => $imgPath,
            'status' => $validatedData['status'] ?? 1,
            'is_featured' => $validatedData['is_featured'] ?? 0,
        ]);

        // Sửa đổi: Sử dụng sync() để đồng bộ hóa các giá trị thuộc tính
        if (isset($validatedData['attribute_value_ids'])) {
            $productVariant->attributeValues()->sync($validatedData['attribute_value_ids']);
        } else {
            // Nếu không có attribute_value_ids nào được gửi, xóa tất cả các liên kết cũ
            $productVariant->attributeValues()->detach();
        }

        if (isset($validatedData['attribute_value_configs']) && is_array($validatedData['attribute_value_configs'])) {
            foreach ($validatedData['attribute_value_configs'] as $configData) {
                $configImgPath = $configData['current_image_path'] ?? null;

                if (isset($configData['image_file']) && $configData['image_file']) {
                    if ($configImgPath && Storage::disk('public')->exists($configImgPath)) {
                        Storage::disk('public')->delete($configImgPath);
                    }
                    $configImgPath = Storage::disk('public')->putFile('uploads/attribute_configs', $configData['image_file']);
                }

                ProductAttributeValueConfig::updateOrCreate(
                    [
                        'product_id' => $productVariant->product_id,
                        'product_attribute_value_id' => $configData['product_attribute_value_id']
                    ],
                    [
                        'price' => $configData['price'] ?? null,
                        'discount_price' => $configData['discount_price'] ?? null,
                        'discount_percent' => $configData['discount_percent'] ?? null,
                        'quantity' => $configData['quantity'] ?? 0,
                        'img_path' => $configImgPath,
                        'is_active' => $configData['is_active'] ?? 1,
                        'is_featured' => $configData['is_featured'] ?? 0,
                    ]
                );
            }
            $submittedConfigValueIds = collect($validatedData['attribute_value_configs'])->pluck('product_attribute_value_id')->toArray();
            ProductAttributeValueConfig::where('product_id', $productVariant->product_id)
                                    ->whereNotIn('product_attribute_value_id', $submittedConfigValueIds)
                                    ->delete();

        } else {
            ProductAttributeValueConfig::where('product_id', $productVariant->product_id)->delete();
        }

        // Tải lại products với các mối quan hệ cần thiết.
        // attributeValueConfigs được load trực tiếp từ Product model.
        $products = Product::with('categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs')->get();
        return response()->json(['success' => 'Variant updated successfully.', 'products' => $products]);
    }

    /**
     * Xóa một biến thể.
     */
    public function destroy(ProductVariant $productVariant)
    {
        $productId = $productVariant->product_id;
        $productVariant->attributeValues()->detach();

        if ($productVariant->img && Storage::disk('public')->exists($productVariant->img)) {
            Storage::disk('public')->delete($productVariant->img);
        }
        $productVariant->delete();

        // Tải lại products với các mối quan hệ cần thiết.
        // attributeValueConfigs được load trực tiếp từ Product model.
        $products = Product::with('categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs')->get();
        return response()->json(['success' => 'Variant deleted successfully.', 'products' => $products]);
    }

    // Phương thức mới để lấy các cấu hình giá trị thuộc tính cho một sản phẩm
    public function getAttributeValueConfigs(Product $product)
    {
        $configs = ProductAttributeValueConfig::where('product_id', $product->id)
            ->with('attributeValue.attributeType')
            ->get();
        return response()->json(['configs' => $configs]);
    }
}
