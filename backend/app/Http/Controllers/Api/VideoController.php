<?php

namespace App\Http\Controllers\Api;

use App\Models\Video;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class VideoController extends Controller
{
    public function index(): JsonResponse
    {
        // Get categories with parent_id not null
        $categories = Category::whereNotNull('parent_id')->get();
        
        // Get videos with their categories
        $videos = Video::with('categories')->get();
        
        // Group videos by category (associative array with category name as key)
        $videosByCategory = [];
        foreach ($categories as $category) {
            $categoryVideos = $videos->filter(function ($video) use ($category) {
                return $video->categories->contains('id', $category->id);
            })
            // Sắp xếp video mới nhất lên đầu
            ->sortByDesc('created_at')
            ->values();

            if ($categoryVideos->isNotEmpty()) {
                $videosByCategory[$category->name] = [
                    'category' => $category,
                    'videos' => $categoryVideos
                ];
            }
        }

        // Sắp xếp các danh mục theo số lượng video giảm dần
        uasort($videosByCategory, function ($a, $b) {
            return count($b['videos']) <=> count($a['videos']);
        });

        // Get videos without categories (these are for all categories), sort by created_at descending
        $allVideos = $videos->filter(function ($video) {
            return $video->categories->isEmpty();
        })->sortByDesc('created_at')->values();

        // Đưa "All" lên đầu
        $result = [];
        if ($allVideos->isNotEmpty()) {
            $result['All'] = [
                'category' => [
                    'id' => 0,
                    'name' => 'All',
                    'description' => 'Videos for all categories'
                ],
                'videos' => $allVideos
            ];
        }
        foreach ($videosByCategory as $key => $value) {
            $result[$key] = $value;
        }

        return response()->json([
            'status' => 'success',
            'data' => $result
        ], 200);
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
}