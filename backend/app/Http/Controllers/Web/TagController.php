<?php

namespace App\Http\Controllers\Web;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Hiển thị danh sách các tag.
     */
    public function index(Request $request)
    {
        $tags = Tag::orderBy('name')->get();

        // Nếu request là AJAX, trả về JSON
        if ($request->ajax()) {
            return response()->json(['tags' => $tags]);
        }

        // Nếu không phải AJAX, trả về view như bình thường
        return view('apps.tag.index', compact('tags'));
    }

    /**
     * Lưu một tag mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $slug = Str::slug($request->name);

        // Kiểm tra slug có trùng lặp không, nếu có thì thêm số vào cuối
        $originalSlug = $slug;
        $count = 1;
        while (Tag::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        Tag::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return response()->json(['success' => 'Tag created successfully.', 'tags' => Tag::orderBy('name')->get()]);
    }

    /**
     * Lấy thông tin của một tag để chỉnh sửa.
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json(['error' => 'Tag not found.'], 404);
        }

        return response()->json(['tag' => $tag]);
    }

    /**
     * Cập nhật thông tin của một tag.
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json(['error' => 'Tag not found.'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => [
                'nullable', // Slug có thể được tạo tự động nếu không cung cấp
                Rule::unique('tags')->ignore($tag->id), // Đảm bảo slug là duy nhất, bỏ qua tag hiện tại
            ],
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Tag::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $tag->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return response()->json(['success' => 'Tag updated successfully.', 'tags' => Tag::orderBy('name')->get()]);
    }

    /**
     * Xóa một tag khỏi cơ sở dữ liệu.
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            return response()->json(['error' => 'Tag not found.'], 404);
        }

        // Tùy chọn: Nếu tags có quan hệ với các bảng khác và bạn không muốn xóa
        // nếu có liên kết, bạn có thể thêm kiểm tra ở đây.
        // Ví dụ: if ($tag->products()->exists()) { /* return error */ }

        $tag->delete();

        return response()->json(['success' => 'Tag deleted successfully.', 'tags' => Tag::orderBy('name')->get()]);
    }
}
