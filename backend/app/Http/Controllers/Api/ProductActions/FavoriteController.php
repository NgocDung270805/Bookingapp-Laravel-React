<?php

namespace App\Http\Controllers\Api\ProductActions;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Get all favorited products for the authenticated user.
     */
    public function index()
    {
        $user = Auth::user();
        // Lấy tất cả sản phẩm yêu thích của người dùng có trạng thái active (status = 1), và trả về variants.attributeValues.attributeType
        $favoritedProducts = $user->favorites()->where('status', 1)->with('variants.attributeValues.attributeType')->get();
        return response()->json([
            'status' => 200,
            'message' => 'Lấy danh sách sản phẩm yêu thích thành công!',
            'favorited_products' => $favoritedProducts
        ]);
    }

    /**
     * Toggle a product as favorite/unfavorite for the authenticated user.
     */
    public function toggle(Product $product)
    {
        try {
            $user = auth()->user();
            $favorite = $user->favorites()->where('product_id', $product->id)->first();

            if ($favorite) {
                $user->favorites()->detach($product->id);
                $message = 'Đã xóa khỏi danh sách yêu thích';
                $is_favorited = false;
            } else {
                $user->favorites()->attach($product->id);
                $message = 'Đã thêm vào danh sách yêu thích';
                $is_favorited = true;
            }

            return response()->json([
                'status' => 200,  // Thêm status vào đây
                'message' => $message,
                'is_favorited' => $is_favorited
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Server Error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get favorited status for a product (or list all favorited products).
     * This example checks status for a specific product.
     */
    public function checkStatus(Product $product)
    {
        $user = Auth::user();
        $isFavorited = $user->favorites()->where('product_id', $product->id)->exists();
        return response()->json([
            'status' => 200,
            'message' => 'Lấy trạng thái yêu thích thành công',
            'is_favorited' => $isFavorited
        ]);
    }
}
