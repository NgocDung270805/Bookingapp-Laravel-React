<?php

namespace App\Http\Controllers\Web;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * Hiển thị danh sách các banner (cho trang web Blade).
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->get();
        // dd($banners);
        return view('apps.banners.index', compact('banners')); // Trả về view Blade
    }

    /**
     * Store a newly created resource in storage.
     * Lưu một banner mới.
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
                Banner::TYPE_CUSTOMERS_HAVE_PURCHASED,
                Banner::TYPE_VEHICLE_DELIVERY,
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

        // Trả về danh sách banners đã cập nhật để refresh bảng
        $updatedBanners = Banner::orderBy('id', 'desc')->get();

        $updatedBanners->map(function($banner) {
            if ($banner->image_path) {
                $banner->image_path = asset('storage/' . $banner->image_path);
            }
            return $banner;
        });
        return response()->json(['success' => 'Banner created successfully.', 'banners' => $updatedBanners]);
    }

    /**
     * Show the form for editing the specified resource.
     * Lấy dữ liệu banner để điền vào form chỉnh sửa.
     */
    public function edit(Banner $banner)
    {
        // Chuyển đổi image_path thành URL đầy đủ cho frontend
        if ($banner->image_path) {
            $banner->image_path = asset('storage/' . $banner->image_path);
        }
        return response()->json(['banner' => $banner]);
    }

    /**
     * Update the specified resource in storage.
     * Cập nhật thông tin của một banner.
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
                Banner::TYPE_CUSTOMERS_HAVE_PURCHASED,
                Banner::TYPE_VEHICLE_DELIVERY,
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

        // Trả về danh sách banners đã cập nhật để refresh bảng
        $updatedBanners = Banner::orderBy('id', 'desc')->get();
        return response()->json(['success' => 'Banner updated successfully.', 'banners' => $updatedBanners]);
    }

    /**
     * Remove the specified resource from storage.
     * Xóa một banner.
     */
    public function destroy(Banner $banner)
    {
        if ($banner->image_path && Storage::disk('public')->exists($banner->image_path)) {
            Storage::disk('public')->delete($banner->image_path);
        }
        $banner->delete();

        // Trả về danh sách banners đã cập nhật để refresh bảng
        $updatedBanners = Banner::orderBy('id', 'desc')->get();
        return response()->json(['success' => 'Banner deleted successfully.', 'banners' => $updatedBanners]);
    }
}
