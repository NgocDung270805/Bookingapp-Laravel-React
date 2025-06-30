<?php

namespace App\Http\Controllers\Api\ProductActions;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Toggle a product as favorite/unfavorite for the authenticated user.
     */
    public function toggle(Product $product)
    {
        $user = Auth::user();

        // Kiểm tra xem sản phẩm đã được yêu thích chưa
        if ($user->favorites()->where('product_id', $product->id)->exists()) {
            $user->favorites()->detach($product->id);
            return response()->json(['message' => 'Sản phẩm đã được xóa khỏi danh sách yêu thích.', 'is_favorited' => false]);
        } else {
            $user->favorites()->attach($product->id);
            return response()->json(['message' => 'Sản phẩm đã được thêm vào danh sách yêu thích.', 'is_favorited' => true]);
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
        return response()->json(['is_favorited' => $isFavorited]);
    }

    /**
     * Get all favorited products for the authenticated user.
     */
    public function index()
    {
        $user = Auth::user();
        $favoritedProducts = $user->favorites()->get(); // Lấy tất cả sản phẩm mà user đã yêu thích
        return response()->json(['favorited_products' => $favoritedProducts]);
    }
}
