<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    public function index(Request $request) // Thêm Request $request vào
    {
        $categories = $this->getCategoriesTreeForView();

        // Nếu request là AJAX, trả về JSON
        if ($request->ajax()) {
            return response()->json(['categories' => $categories]);
        }

        // Nếu không phải AJAX, trả về view như bình thường
        return view('apps.category.index', compact('categories'));
    }

    // ... giữ nguyên các phương thức store, edit, update, destroy và getDescendantIds ...

    // Hàm trợ giúp để lấy cây danh mục và bao gồm tên cha
    private function getCategoriesTreeForView($parentId = null, $level = 0)
    {
        $categories = Category::where('parent_id', $parentId)
                               ->with('parent') // Tải quan hệ parent
                               ->orderBy('name')
                               ->get();

        $tree = [];
        foreach ($categories as $category) {
            $category->level = $level; // Thêm cấp độ để thụt lề trong view
            $tree[] = $category;
            $children = $this->getCategoriesTreeForView($category->id, $level + 1);
            $tree = array_merge($tree, $children);
        }
        return $tree;
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imgPath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            // Lưu ảnh vào storage/app/public/uploads/categories
            // và trả về đường dẫn tương đối từ thư mục public disk.
            $imgPath = Storage::disk('public')->putFile('uploads/categories', $image);
            // $imgPath sẽ có dạng 'uploads/categories/ten_file_random.jpg'
            // Laravel tự động tạo tên file duy nhất.
        }

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'img' => $imgPath,
            'parent_id' => $request->parent_id,
            'status' => $request->status ?? 1,
        ]);

        return response()->json([
            'success' => 'Category created successfully.',
            'categories' => $this->getCategoriesTreeForView()
        ]);
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        $availableParents = Category::where('id', '!=', $id)
                                    ->where(function($query) use ($id) {
                                        $descendants = $this->getDescendantIds($id);
                                        $query->whereNotIn('id', $descendants);
                                    })
                                    ->get();

        return response()->json([
            'category' => $category,
            'availableParents' => $availableParents
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => [
                'nullable',
                Rule::exists('categories', 'id'),
                function ($attribute, $value, $fail) use ($id) {
                    if ($value == $id) {
                        $fail('A category cannot be its own parent.');
                    }
                    if ($value) {
                        $descendants = $this->getDescendantIds($id);
                        if (in_array($value, $descendants)) {
                            $fail('A category cannot be a child of its own descendant.');
                        }
                    }
                },
            ],
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
        ]);

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Category::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $imgPath = $category->img;
        if ($request->hasFile('img')) {
            // Xóa ảnh cũ từ storage disk nếu có
            if ($imgPath && Storage::disk('public')->exists($imgPath)) {
                Storage::disk('public')->delete($imgPath);
            }
            $image = $request->file('img');
            // Lưu ảnh mới vào storage/app/public/uploads/categories
            $imgPath = Storage::disk('public')->putFile('uploads/categories', $image);
        }

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'img' => $imgPath,
            'parent_id' => $request->parent_id,
            'status' => $request->status ?? 1,
        ]);

        return response()->json([
            'success' => 'Category updated successfully.',
            'categories' => $this->getCategoriesTreeForView()
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['error' => 'Category not found.'], 404);
        }

        if ($category->children()->exists()) {
            return response()->json(['error' => 'Cannot delete category with subcategories. Please delete subcategories first.'], 400);
        }

        // Xóa ảnh từ storage disk nếu có
        if ($category->img && Storage::disk('public')->exists($category->img)) {
            Storage::disk('public')->delete($category->img);
        }

        $category->delete();

        return response()->json([
            'success' => 'Category deleted successfully.',
            'categories' => $this->getCategoriesTreeForView()
        ]);
    }

    private function getDescendantIds($categoryId)
    {
        $ids = [];
        $children = Category::where('parent_id', $categoryId)->get();
        foreach ($children as $child) {
            $ids[] = $child->id;
            $ids = array_merge($ids, $this->getDescendantIds($child->id));
        }
        return $ids;
    }
}
