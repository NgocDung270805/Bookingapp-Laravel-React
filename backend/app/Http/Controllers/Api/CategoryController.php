<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Lấy tất cả danh mục.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            // Lấy tất cả danh mục với các trường cần thiết
            $categories = Category::select('id', 'name', 'slug', 'description', 'img', 'parent_id', 'status')->whereNull('parent_id')->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Lấy danh sách danh mục thành công',
                'categories' => $categories
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể tải danh sách danh mục: ' . $e->getMessage()
            ], 500);
        }
    }
}
