<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function geminiChat(Request $request)
    {
        $request->validate(['message' => 'required|string|max:1000']);

        $userMessage = $request->input('message');
        $geminiApiKey = env('GEMINI_API_KEY');

        if (!$geminiApiKey) {
            return response()->json(['error' => 'Gemini API Key not configured on server.'], 500);
        }

        // --- Bước 1: Trích xuất từ khóa tìm kiếm sản phẩm từ tin nhắn gốc của người dùng ---
        $suggestedProducts = [];
        $lowerUserMessage = strtolower($userMessage);

        $searchQuery = '';
        $productKeywords = ['sản phẩm', 'xe', 'tư vấn', 'tìm kiếm', 'muốn biết về', 'về', 'model', 'loại', 'giá', 'mua', 'bán', 'có không', 'camry', 'everest', 'toyota', 'ford', 'sedan', 'suv']; // Đây là danh sách các từ khóa về xe

        $allProductNamesInDb = Product::select('name')->get()->pluck('name')->map(function ($name) {
            return strtolower($name);
        })->toArray();

        foreach ($allProductNamesInDb as $productName) {
            if (str_contains($lowerUserMessage, $productName)) {
                $searchQuery = $productName;
                break;
            }
        }

        if (empty($searchQuery)) {
            foreach ($productKeywords as $keyword) {
                if (str_contains($lowerUserMessage, $keyword)) {
                    $afterKeyword = substr($lowerUserMessage, strpos($lowerUserMessage, $keyword) + strlen($keyword));
                    $searchQuery = trim($afterKeyword);
                    break;
                }
            }
        }
        if (empty($searchQuery)) {
            $searchQuery = $lowerUserMessage;
        }

        $commonWords = ['tôi', 'bạn', 'là', 'có', 'cái', 'nào', 'gì', 'thế', 'này', 'đó', 'xin', 'chào', 'cảm ơn', 'hỏi', 'cho', 'biết', 'không', 'muốn', 'về']; // Đây là danh sách các từ thông dụng
        $searchQueryParts = array_filter(preg_split('/\s+/', $searchQuery), function ($word) use ($commonWords) {
            return !in_array($word, $commonWords) && strlen($word) > 1;
        });
        $finalSearchQuery = implode(' ', $searchQueryParts);
        $finalSearchQuery = trim($finalSearchQuery);

        Log::info('Final Search Query for DB: ' . $finalSearchQuery);

        if (!empty($finalSearchQuery) && strlen($finalSearchQuery) > 2) {
            $productsFromDb = Product::select('id', 'name', 'slug', 'img', 'views')
                ->where('name', 'like', '%' . $finalSearchQuery . '%')
                ->orWhere('description', 'like', '%' . $finalSearchQuery . '%')
                ->limit(3)
                ->get();
                
            foreach ($productsFromDb as $product) {
                $suggestedProducts[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'img' => $product->img ? asset('storage/' . $product->img) : null,
                    'views' => $product->views, // THÊM TRƯỜNG VIEWS VÀO ĐÂY
                ];
            }
        }
        Log::info('Suggested Products from DB: ' . json_encode($suggestedProducts));
        // --- Kết thúc tìm kiếm sản phẩm ---


        // --- Bước 2: Gọi Gemini API với prompt được điều chỉnh ---
        $promptForGemini = "Bạn là một trợ lý tư vấn sản phẩm cho một website 'Văn Đại Car' bán xe. Trả lời câu hỏi sau một cách NGẮN GỌN, TRỰC TIẾP và HỮU ÍCH (tối đa 2-3 câu). Không tự nhận là không bán 
        sản phẩm. Nếu câu hỏi liên quan đến sản phẩm, hãy xác định tên sản phẩm và TRẢ LỜI NGẮN GỌN về sản phẩm đó, sau đó đề xuất người dùng xem chi tiết trên website của chúng tôi. Tránh các câu hỏi phức 
        tạp và không lên quan và không đi sau vào các câu hỏi về kỹ thuật, lịch sử hoặc đối thủ cạnh tranh, thay vào đó nhận diện các câu hỏi và đề xuất tìm kiếm các chuyên gia và quản trị của website, số 
        điện thoại của quản trị viên hệ thống '+84 965.336.741', và sau đó chuyển hướng cuộc trò chuyện về mục tiêu chính bán xe, đặt lịch. Sau mỗi câu trả lời, nên kết thúc bằng các lời kêu gọi 'Đặt lịch 
        lái thử.','Xem chi tiết trên website.', 'Đặt lịch hẹn tư vấn.', 'Liên hệ để nhận báo giá chính xác nhất.', hãy linh hoạt trong cách sử dụng các lời kêu gọi hành động để tránh lặp lại. Có thể kết hợp 
        'Đặt lịch lái thử' với một câu hỏi như 'Bạn có muốn trải nghiệm thực tế xe không?' để cuộc trò chuyện tự nhiên hơn. Khi người dùng hỏi về giá, hãy trả lời một cách khéo léo về sản phẩm chưa có giá 
        (liên hệ). Thay vì đưa ra một con số cụ thể, hãy đề xuất họ liên hệ để nhận báo giá chính xác nhất kèm theo các chương trình ưu đãi hiện tại. Tuyệt đối không sử dụng các từ ngữ tiêu cực hoặc mang 
        tính chất chê bai khi nói về sản phẩm của đối thủ. Chỉ tập trung vào điểm mạnh của xe tại 'Văn Đại Car'. Với câu hỏi khó giữ sự tôn trọng và lập trường của trợ lý bán hàng. Câu hỏi không liên quan 
        khéo léo từ chối và lái cuộc trò chuyện về sản phẩm của mình. Nếu có xe hiển thị cho khách hàng luôn, không đưa đưa ra các xe không có trong hệ thống tránh bị lỗi. Câu hỏi của người dùng: " . $userMessage;
        $geminiResponse = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-goog-api-key' => $geminiApiKey,
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent", [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $promptForGemini],
                    ],
                ],
            ],
            'generationConfig' => [
                'temperature' => 0.4,
                'topK' => 40,
                'topP' => 0.95,
                'maxOutputTokens' => 80,
            ],
            'safetySettings' => [
                ['category' => 'HARM_CATEGORY_HATE_SPEECH', 'threshold' => 'BLOCK_NONE'],
                ['category' => 'HARM_CATEGORY_SEXUALLY_EXPLICIT', 'threshold' => 'BLOCK_NONE'],
                ['category' => 'HARM_CATEGORY_HARASSMENT', 'threshold' => 'BLOCK_NONE'],
                ['category' => 'HARM_CATEGORY_DANGEROUS_CONTENT', 'threshold' => 'BLOCK_NONE'],
            ],
        ]);

        $geminiResponseData = $geminiResponse->json();

        if (isset($geminiResponseData['error'])) {
            Log::error('Gemini API Error: ' . json_encode($geminiResponseData));
            return response()->json(['error' => 'Lỗi từ dịch vụ AI: ' . ($geminiResponseData['error']['message'] ?? 'Unknown error')], 500);
        }

        $aiTextResponse = $geminiResponseData['candidates'][0]['content']['parts'][0]['text'] ?? 'Xin lỗi, tôi không thể xử lý yêu cầu này lúc này.';
        Log::info('Gemini AI Raw Response: ' . $aiTextResponse);

        // --- Bước 3: Trả về phản hồi tổng hợp cho Frontend ---
        return response()->json([
            'ai_response' => $aiTextResponse,
            'suggested_products' => $suggestedProducts,
        ]);
    }
}
