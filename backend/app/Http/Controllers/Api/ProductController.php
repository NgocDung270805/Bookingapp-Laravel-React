<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with([
            'categories',
            'tags',
            'variants.attributeValues.attributeType',
            'attributeValueConfigs.attributeValue.attributeType'
        ]);

        // Thêm logic tìm kiếm nếu có query param 'q' hoặc 'name'
        if ($request->has('q') && !empty($request->q)) {
            $searchQuery = $request->q;
            $query->where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('description', 'like', '%' . $searchQuery . '%');
        }

        // Lọc sản phẩm theo Category
        if ($request->has('category') && !empty($request->category)) {
            $categorySlug = $request->category;
            $query->whereHas('categories', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        // Lọc 4 sản phẩm mới nhất theo created_at
        if ($request->has('latest') && $request->latest) {
            $query->orderBy('created_at', 'desc')->limit(4);
        }

        // Lọc 6 sản phẩm có views cao nhất
        if ($request->has('most_viewed') && $request->most_viewed) {
            $query->orderBy('views', 'desc')->limit(6);
        }

        $products = $query->orderBy('id')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Lấy danh sách sản phẩm thành công',
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,id',
        ];

        $validatedData = $request->validate($rules);

        $imgPath = null;
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products', $image);
        }

        $product = Product::create([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'img' => $imgPath,
            'status' => $validatedData['status'] ?? 1,
            'is_featured' => $validatedData['is_featured'] ?? 0,
        ]);

        if (isset($validatedData['category_ids'])) {
            $product->categories()->sync($validatedData['category_ids']);
        } else {
            $product->categories()->detach();
        }

        if (isset($validatedData['tag_ids'])) {
            $product->tags()->sync($validatedData['tag_ids']);
        } else {
            $product->tags()->detach();
        }

        // Tải lại sản phẩm với các mối quan hệ để trả về response đầy đủ
        $product->load(['categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs.attributeValue.attributeType']);
        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($product_slug)
    {
        try {
            $product = Product::where('slug', $product_slug)
                ->with('images', 'categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs.attributeValue.attributeType', 'favoritedByUsers', 'comments.user', 'bookings')
                ->first();

            if (!$product) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không tìm thấy sản phẩm'
                ], 404);
            }

            // Lấy sản phẩm liên quan
            $related_products = Product::where('id', '!=', $product->id)
                ->where(function ($query) use ($product) {
                    $query->whereHas('categories', function ($q) use ($product) {
                        $q->whereIn('categories.id', $product->categories->pluck('id'));
                    })
                        ->orWhereHas('tags', function ($q) use ($product) {
                            $q->whereIn('tags.id', $product->tags->pluck('id'));
                        });
                })
                ->with('images', 'variants.attributeValues.attributeType', 'favoritedByUsers', 'tags')
                ->inRandomOrder()
                ->take(8)
                ->get();


            // Gán related_products vào product
            $product->related_products = $related_products;

            return response()->json([
                'status' => 'success',
                'message' => 'Lấy chi tiết sản phẩm thành công',
                'product' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể tải chi tiết sản phẩm: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => ['required', 'string', 'max:255', Rule::unique('products')->ignore($product->id)],
            'description' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'boolean',
            'is_featured' => 'boolean',
            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'exists:tags,id',
        ];

        $validatedData = $request->validate($rules);

        $imgPath = $product->img;
        if ($request->hasFile('img')) {
            if ($imgPath && Storage::disk('public')->exists($imgPath)) {
                Storage::disk('public')->delete($imgPath);
            }
            $image = $request->file('img');
            $imgPath = Storage::disk('public')->putFile('uploads/products', $image);
        }

        $product->update([
            'name' => $validatedData['name'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'img' => $imgPath,
            'status' => $validatedData['status'] ?? 1,
            'is_featured' => $validatedData['is_featured'] ?? 0,
        ]);

        if (isset($validatedData['category_ids'])) {
            $product->categories()->sync($validatedData['category_ids']);
        } else {
            $product->categories()->detach();
        }

        if (isset($validatedData['tag_ids'])) {
            $product->tags()->sync($validatedData['tag_ids']);
        } else {
            $product->tags()->detach();
        }

        $product->load(['categories', 'tags', 'variants.attributeValues.attributeType', 'attributeValueConfigs.attributeValue.attributeType']);
        return response()->json(['message' => 'Product updated successfully', 'product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Xóa các mối quan hệ trước khi xóa sản phẩm chính
        $product->categories()->detach();
        $product->tags()->detach();

        // Xóa variants và images liên quan (đảm bảo các mối quan hệ cascade delete hoặc xử lý thủ công)
        // Nếu bạn đã cấu hình cascade on delete ở DB hoặc trong model, có thể không cần detach/delete thủ công.
        // Tuy nhiên, việc detach Many-to-Many thì luôn cần.
        $product->variants()->delete(); // Xóa tất cả variants của sản phẩm này
        $product->images()->delete(); // Xóa tất cả images của sản phẩm này
        $product->attributeValueConfigs()->delete(); // Xóa tất cả configs thuộc tính của sản phẩm này

        if ($product->img && Storage::disk('public')->exists($product->img)) {
            Storage::disk('public')->delete($product->img);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }

    /**
     * MỚI / ĐIỀU CHỈNH: Lấy danh sách sản phẩm theo slug danh mục (Many-to-Many).
     *
     * @param string $category_slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function productsByCategory($category_slug)
    {
        try {
            $category = Category::where('slug', $category_slug)->first();

            if (!$category) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không tìm thấy danh mục'
                ], 404);
            }

            // ĐIỀU CHỈNH: Sử dụng whereHas để lọc sản phẩm thuộc danh mục qua bảng trung gian
            $products = Product::whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            })
                ->with('images', 'categories') // Đã sửa từ 'category' thành 'categories'
                ->paginate(10);

            return response()->json([
                'status' => 'success',
                'message' => 'Lấy sản phẩm theo danh mục thành công',
                'category' => [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'image_path' => $category->image_path,
                ],
                'products' => $products
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể tải sản phẩm theo danh mục: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Toggle favorite status for a product.
     *
     * @param int $productId
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggleFavorite($productId)  
    {
        try {
            $user = auth()->user();
            $product = Product::findOrFail($productId);
            
            $isFavorited = $product->favoritedByUsers()->where('user_id', $user->id)->exists();
            
            if ($isFavorited) {
                $product->favoritedByUsers()->detach($user->id);
                $message = "Đã xóa khỏi danh sách yêu thích";
                $is_favorited = false;
            } else {
                $product->favoritedByUsers()->attach($user->id);
                $message = "Đã thêm vào danh sách yêu thích";
                $is_favorited = true;
            }

            // Load lại product với favorite users
            $product->load('favoritedByUsers');

            return response()->json([
                'status' => 'success',
                'message' => $isFavorited ? 'Đã xóa khỏi danh sách yêu thích' : 'Đã thêm vào danh sách yêu thích',
                'product' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
