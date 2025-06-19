<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeType;
use App\Models\ProductAttributeValue;

class ProductAttributeValueController extends Controller
{
    /**
     * Display a listing of the resource for a specific attribute type.
     */
    public function index(ProductAttributeType $attributeType, Request $request)
    {
        $attributeValues = $attributeType->values()->orderBy('value')->get();

        if ($request->ajax()) {
            return response()->json(['attributeValues' => $attributeValues]);
        }
        // View này có thể không cần thiết nếu luôn gọi qua AJAX
        return view('apps.product_attributes.values.index', compact('attributeType', 'attributeValues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ProductAttributeType $attributeType)
    {
        $request->validate([
            'value' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_attribute_values')->where(function ($query) use ($attributeType) {
                    return $query->where('attribute_type_id', $attributeType->id);
                }),
            ],
            'metadata' => 'nullable|json',
        ]);

        $attributeValue = $attributeType->values()->create([
            'value' => $request->value,
            'metadata' => $request->metadata,
        ]);

        return response()->json(['success' => 'Attribute Value created successfully.', 'attributeValue' => $attributeValue, 'attributeValues' => $attributeType->values()->orderBy('value')->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductAttributeValue $attributeValue)
    {
        return response()->json(['attributeValue' => $attributeValue]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductAttributeValue $attributeValue)
    {
        $request->validate([
            'value' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_attribute_values')->where(function ($query) use ($attributeValue) {
                    return $query->where('attribute_type_id', $attributeValue->attribute_type_id);
                })->ignore($attributeValue->id),
            ],
            'metadata' => 'nullable|json',
        ]);

        $attributeValue->update([
            'value' => $request->value,
            'metadata' => $request->metadata,
        ]);

        return response()->json(['success' => 'Attribute Value updated successfully.', 'attributeValue' => $attributeValue, 'attributeValues' => $attributeValue->attributeType->values()->orderBy('value')->get()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductAttributeValue $attributeValue)
    {
        // Kiểm tra nếu giá trị thuộc tính này đang được sử dụng bởi bất kỳ biến thể nào
        if ($attributeValue->variants()->exists()) {
            return response()->json(['error' => 'Cannot delete attribute value used by product variants.'], 400);
        }

        $attributeValue->delete();
        return response()->json(['success' => 'Attribute Value deleted successfully.', 'attributeValues' => $attributeValue->attributeType->values()->orderBy('value')->get()]);
    }
}
