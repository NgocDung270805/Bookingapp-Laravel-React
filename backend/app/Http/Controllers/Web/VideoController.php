<?php

namespace App\Http\Controllers\Web;

use App\Models\Video;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::with('categories')->get();
        
        // Get categories with parent_id not null and group by name to remove duplicates
        $categories = Category::whereNotNull('parent_id')
            ->get()
            ->groupBy('name')
            ->map(function ($group) {
                // For each group of same-named categories, return the first one
                return $group->first();
            })
            ->values();
        return view('apps.video.index', compact('videos', 'categories'));
    }

    public function create()
    {
        return response()->json([
            'status' => 'success',
            'videos' => Video::with('categories')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'video_file' => 'required|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:102400', // 100MB max
            'img_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'status' => 'boolean',
            'categories' => 'array'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        
        // Handle video upload
        if ($request->hasFile('video_file')) {
            $videoPath = $request->file('video_file')->store('videos/files', 'public');
            $data['video'] = $videoPath;
        }
        
        if ($request->hasFile('img_banner')) {
            $path = $request->file('img_banner')->store('videos/banners', 'public');
            $data['img_banner'] = $path;
        }

        $video = Video::create($data);

        if ($request->has('categories')) {
            $categories = array_filter($request->categories); // Loại bỏ giá trị rỗng
            if (empty($categories)) {
                // Nếu chọn "Tất cả", xóa hết categories
                $video->categories()->detach();
            } else {
                $video->categories()->sync($categories);
            }
        }

        return response()->json([
            'success' => 'Video created successfully',
            'videos' => Video::with('categories')->get()
        ]);
    }

    public function edit($id)
    {
        $video = Video::with('categories')->findOrFail($id);
        // Get filtered categories
        $categories = Category::whereNotNull('parent_id')
            ->get()
            ->groupBy('name')
            ->map(function ($group) {
                return $group->first();
            })
            ->values();
        return response()->json([
            'video' => $video,
            'categories' => $categories
        ]);
    }

    public function toggleStatus($id)
    {
        $video = Video::findOrFail($id);
        $video->status = !$video->status;
        $video->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully'
        ]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        
        $request->validate([
            'name' => 'string|max:255',
            'video_file' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:102400', // 100MB max
            'img_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'status' => 'boolean',
            'categories' => 'array'
        ]);

        $data = $request->all();
        
        if ($request->has('name')) {
            $data['slug'] = Str::slug($request->name);
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            if ($video->video) {
                Storage::disk('public')->delete($video->video);
            }
            $videoPath = $request->file('video_file')->store('videos/files', 'public');
            $data['video'] = $videoPath;
        }

        if ($request->hasFile('img_banner')) {
            if ($video->img_banner) {
                Storage::disk('public')->delete($video->img_banner);
            }
            $path = $request->file('img_banner')->store('videos/banners', 'public');
            $data['img_banner'] = $path;
        }

        $video->update($data);

        if ($request->has('categories')) {
            $categories = array_filter($request->categories); // Loại bỏ giá trị rỗng
            if (empty($categories)) {
                // Nếu chọn "Tất cả", xóa hết categories
                $video->categories()->detach();
            } else {
                $video->categories()->sync($categories);
            }
        }

        return response()->json([
            'success' => 'Video updated successfully',
            'videos' => Video::with('categories')->get()
        ]);
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        if ($video->img_banner) {
            Storage::disk('public')->delete($video->img_banner);
        }
        $video->delete();
        
        return response()->json([
            'success' => 'Video deleted successfully',
            'videos' => Video::with('categories')->get()
        ]);
    }
}