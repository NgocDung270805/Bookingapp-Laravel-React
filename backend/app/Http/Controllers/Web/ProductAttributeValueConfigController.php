<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product; // Import Model Product
use Illuminate\Support\Facades\Log; // Bạn đã có dòng này
use App\Models\ProductAttributeValueConfig; // THÊM DÒNG NÀY

class ProductAttributeValueConfigController extends Controller
{
    /**
     * Display a listing of the product attribute value configurations for a specific product.
     */
    public function index(Product $product)
    {
        try {
            // Lấy tất cả các cấu hình thuộc tính giá trị liên quan đến sản phẩm này
            // Tải mối quan hệ attributeValue trước
            $configs = $product->attributeValueConfigs()->with('attributeValue')->get();

            // Sau đó, tải riêng mối quan hệ attributeType cho mỗi attributeValue
            // (Mặc dù hasOneThrough có thể được tải bằng 'with', đôi khi nested loading có vấn đề)
            // Cách đơn giản và mạnh mẽ hơn là sử dụng loadMissing hoặc eager load trực tiếp trên ProductAttributeValue
            $configs->loadMissing('attributeValue.attributeType'); // Tải mối quan hệ attributeType thông qua attributeValue

            return response()->json(['configs' => $configs]);
        } catch (\Exception $e) {
            Log::error('Error loading product attribute value configs: ' . $e->getMessage(), [
                'product_id' => $product->id,
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json(['error' => 'Internal Server Error: Could not load attribute configs.'], 500);
        }
    }

    // ... các phương thức khác ...
}