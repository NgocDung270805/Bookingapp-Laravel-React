<?php

namespace App\Http\Controllers\Api;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // Thêm Request $request để nhận query params
    {
        $query = Banner::orderBy('id', 'desc');

        // Lọc theo type nếu có tham số 'type' trong request
        if ($request->has('type')) {
            $query->where('type', $request->input('type'));
        }
        
        // Chỉ lấy banner đang hoạt động (thường là mặc định cho hiển thị frontend)
        $query->where('is_active', true); 

        $banners = $query->get();
        
        // Chuyển đổi image_path thành URL đầy đủ cho frontend
        $banners->map(function($banner) {
            if ($banner->image_path) {
                $banner->image_path = asset('storage/' . $banner->image_path);
            }
            return $banner;
        });

        return response()->json(['banners' => $banners]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'type' => 'required|integer|in:' . implode(',', [
                Banner::TYPE_LOGO,
                Banner::TYPE_FOOTER_BACKGROUND,
                Banner::TYPE_HOMEPAGE_BANNER,
                Banner::TYPE_SLIDER_IMAGE,
                Banner::TYPE_PRODUCT_BANNER,
            ]),
            'title' => 'nullable|string|max:255',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ];
        $validatedData = $request->validate($rules);
        $imagePath = null;
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $imagePath = Storage::disk('public')->putFile('uploads/banners', $image);
        } else {
            return response()->json(['error' => 'Image file is required.'], 422);
        }
        $banner = Banner::create([
            'type' => $validatedData['type'],
            'title' => $validatedData['title'] ?? null,
            'image_path' => $imagePath,
            'link' => $validatedData['link'] ?? null,
            'is_active' => $validatedData['is_active'] ?? true,
        ]);
        if ($banner->image_path) {
            $banner->image_path = asset('storage/' . $banner->image_path);
        }
        return response()->json(['message' => 'Banner created successfully', 'banner' => $banner], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        if ($banner->image_path) {
            $banner->image_path = asset('storage/' . $banner->image_path);
        }
        return response()->json(['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $rules = [
            'type' => 'required|integer|in:' . implode(',', [
                Banner::TYPE_LOGO,
                Banner::TYPE_FOOTER_BACKGROUND,
                Banner::TYPE_HOMEPAGE_BANNER,
                Banner::TYPE_SLIDER_IMAGE,
                Banner::TYPE_PRODUCT_BANNER,
            ]),
            'title' => 'nullable|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'current_image_path' => 'nullable|string',
        ];
        $validatedData = $request->validate($rules);
        $imagePath = $banner->image_path;
        if ($request->hasFile('image_file')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $image = $request->file('image_file');
            $imagePath = Storage::disk('public')->putFile('uploads/banners', $image);
        } else if (isset($validatedData['current_image_path']) && $validatedData['current_image_path'] === '') {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = null;
        } else if (isset($validatedData['current_image_path'])) {
            $imagePath = $validatedData['current_image_path'];
        }
        $banner->update([
            'type' => $validatedData['type'],
            'title' => $validatedData['title'] ?? null,
            'image_path' => $imagePath,
            'link' => $validatedData['link'] ?? null,
            'is_active' => $validatedData['is_active'] ?? false,
        ]);
        if ($banner->image_path) {
            $banner->image_path = asset('storage/' . $banner->image_path);
        }
        return response()->json(['message' => 'Banner updated successfully', 'banner' => $banner]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        if ($banner->image_path && Storage::disk('public')->exists($banner->image_path)) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();
        return response()->json(['message' => 'Banner deleted successfully']);
    }

    /**
     * Get banners by type.
     * Lấy danh sách banners dựa trên loại (type).
     */
    public function getBannersByType($type)
    {
        $banners = Banner::where('type', $type)
                         ->where('is_active', true) // Chỉ lấy banner đang hoạt động
                         ->orderBy('id', 'desc')
                         ->get();
        
        $banners->map(function($banner) {
            if ($banner->image_path) {
                $banner->image_path = asset('storage/' . $banner->image_path);
            }
            return $banner;
        });

        return response()->json(['banners' => $banners]);
    }
}
