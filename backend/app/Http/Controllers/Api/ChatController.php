<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    /**
     * Handle chat message and get response from Google Gemini.
     */
    public function geminiChat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $request->input('message');
        $geminiApiKey = env('GEMINI_API_KEY'); // Lấy API Key từ .env

        if (!$geminiApiKey) {
            return response()->json(['error' => 'Gemini API Key not configured on server.'], 500);
        }

        // --- Bước 1: Gọi Gemini API với cấu hình mới ---
        $geminiResponse = Http::withHeaders([
            'Content-Type' => 'application/json', // Header này đã có trong hướng dẫn curl
            'X-goog-api-key' => $geminiApiKey,     // Truyền API Key qua header
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent", [ // URL endpoint mới
            'contents' => [
                [
                    'parts' => [
                        ['text' => $userMessage],
                    ],
                ],
            ],
            // Bạn có thể thêm 'generationConfig' và 'safetySettings' nếu muốn kiểm soát thêm hành vi của AI
            // Ví dụ:
            // 'generationConfig' => [
            //     'temperature' => 0.9,
            //     'topK' => 1,
            //     'topP' => 1,
            //     'maxOutputTokens' => 200,
            // ],
            // 'safetySettings' => [
            //     ['category' => 'HARM_CATEGORY_HATE_SPEECH', 'threshold' => 'BLOCK_NONE'],
            //     ['category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT', 'threshold' => 'BLOCK_NONE'],
            //     ['category' => 'HARM_CATEGORY_HARASSMENT', 'threshold' => 'BLOCK_NONE'],
            //     ['category' => 'HARM_CATEGORY_DANGEROUS_CONTENT', 'threshold' => 'BLOCK_NONE'],
            // ],
        ]);

        $geminiResponseData = $geminiResponse->json();

        // Kiểm tra lỗi từ Gemini
        if (isset($geminiResponseData['error'])) {
            Log::error('Gemini API Error: ' . json_encode($geminiResponseData));
            return response()->json(['error' => 'Lỗi từ dịch vụ AI: ' . ($geminiResponseData['error']['message'] ?? 'Unknown error')], 500);
        }
        
        // Trích xuất văn bản từ phản hồi của Gemini
        // Đảm bảo cấu trúc phản hồi khớp với API mới. Có thể cần điều chỉnh nếu nó khác gemini-pro.
        $aiTextResponse = $geminiResponseData['candidates'][0]['content']['parts'][0]['text'] ?? 'Xin lỗi, tôi không thể xử lý yêu cầu này lúc này.';

        // --- Bước 2: Phân tích phản hồi của AI và tìm sản phẩm trong DB của bạn ---
        // Logic này giữ nguyên như trước, tìm kiếm sản phẩm dựa trên từ khóa từ phản hồi AI
        $products = [];
        $lowerAiText = strtolower($aiTextResponse);

        // Lấy tất cả sản phẩm để kiểm tra xem phản hồi của AI có nhắc đến tên sản phẩm nào không
        $allProducts = Product::select('id', 'name', 'slug')->get(); 
        
        foreach ($allProducts as $product) {
            // Kiểm tra xem tên sản phẩm có chứa trong phản hồi AI không
            if (str_contains($lowerAiText, strtolower($product->name))) {
                $products[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                ];
            }
        }

        // --- Bước 3: Trả về phản hồi tổng hợp cho Frontend ---
        return response()->json([
            'ai_response' => $aiTextResponse,
            'suggested_products' => $products,
        ]);
    }
}
