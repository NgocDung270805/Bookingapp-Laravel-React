<?php

namespace App\Http\Controllers\Api\ProductActions;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Get all comments for a specific product.
     */
    public function index(Product $product)
    {
        $comments = $product->comments()->with('user')->orderBy('created_at', 'desc')->get();
        return response()->json(['comments' => $comments]);
    }

    /**
     * Store a new comment for a product.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'rating' => 'nullable|integer|min:1|max:5',
            'parent_id' => 'nullable|exists:comments,id', 
        ]);

        $comment = $product->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'rating' => $request->rating,
            'parent_id' => $request->parent_id, 
        ]);

        $comment->load('user'); 
        return response()->json(['message' => 'Bình luận đã được thêm.', 'comment' => $comment], 201);
    }

    /**
     * Update the specified comment.
     */
    public function update(Request $request, Comment $comment)
    {
        // Đảm bảo chỉ người dùng sở hữu comment mới có thể cập nhật
        if ($comment->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'content' => 'required|string|max:500',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $comment->update($request->all());
        $comment->load('user');
        return response()->json(['message' => 'Bình luận đã được cập nhật.', 'comment' => $comment]);
    }

    /**
     * Remove the specified comment.
     */
    public function destroy(Comment $comment)
    {
        // Đảm bảo chỉ người dùng sở hữu comment hoặc admin/manager mới có thể xóa
        if ($comment->user_id !== Auth::id() && !Auth::user()->hasRole('admin') && !Auth::user()->hasRole('manager')) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $comment->delete();
        return response()->json(['message' => 'Bình luận đã được xóa.']);
    }
}