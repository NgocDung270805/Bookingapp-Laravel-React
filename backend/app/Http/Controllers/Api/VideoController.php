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
        
        // Group videos by category
        $videosByCategory = [];
        foreach ($categories as $category) {
            $categoryVideos = $videos->filter(function ($video) use ($category) {
                return $video->categories->contains('id', $category->id);
            })->values();
            
            if ($categoryVideos->isNotEmpty()) {
                $videosByCategory[$category->name] = [
                    'category' => $category,
                    'videos' => $categoryVideos
                ];
            }
        }
        
        // Get videos without categories (these are for all categories)
        $allVideos = $videos->filter(function ($video) {
            return $video->categories->isEmpty();
        })->values();
        
        if ($allVideos->isNotEmpty()) {
            $videosByCategory['All'] = [
                'category' => [
                    'id' => 0,
                    'name' => 'All',
                    'description' => 'Videos for all categories'
                ],
                'videos' => $allVideos
            ];
        }

        return response()->json([
            'status' => 'success',
            'data' => $videosByCategory
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