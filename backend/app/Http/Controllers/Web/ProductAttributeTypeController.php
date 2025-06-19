<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeType;

class ProductAttributeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $attributeTypes = ProductAttributeType::with('values')->orderBy('name')->get();

        if ($request->ajax()) {
            return response()->json(['attributeTypes' => $attributeTypes]);
        }
        return view('apps.product_attributes.types.index', compact('attributeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'display_type' => 'required|in:text,color_picker,dropdown,radio,checkbox',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (ProductAttributeType::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $attributeType = ProductAttributeType::create([
            'name' => $request->name,
            'slug' => $slug,
            'display_type' => $request->display_type,
        ]);

        return response()->json(['success' => 'Attribute Type created successfully.', 'attributeType' => $attributeType, 'attributeTypes' => ProductAttributeType::with('values')->orderBy('name')->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductAttributeType $attributeType)
    {
        return response()->json(['attributeType' => $attributeType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductAttributeType $attributeType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'display_type' => 'required|in:text,color_picker,dropdown,radio,checkbox',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (ProductAttributeType::where('slug', $slug)->where('id', '!=', $attributeType->id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $attributeType->update([
            'name' => $request->name,
            'slug' => $slug,
            'display_type' => $request->display_type,
        ]);

        return response()->json(['success' => 'Attribute Type updated successfully.', 'attributeType' => $attributeType, 'attributeTypes' => ProductAttributeType::with('values')->orderBy('name')->get()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductAttributeType $attributeType)
    {
        // Kiểm tra nếu có giá trị thuộc tính nào đang sử dụng loại thuộc tính này
        if ($attributeType->values()->exists()) {
            return response()->json(['error' => 'Cannot delete attribute type with existing values.'], 400);
        }

        $attributeType->delete();
        return response()->json(['success' => 'Attribute Type deleted successfully.', 'attributeTypes' => ProductAttributeType::with('values')->orderBy('name')->get()]);
    }
}
