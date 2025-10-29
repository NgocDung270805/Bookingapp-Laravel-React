<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AppNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/**
 * @method string normalizeModelClass(string $class)
 */
class NotificationController extends Controller
{
    protected $displayPages = [
        'user' => [
            'home' => 'Trang chủ',
            'products' => 'Danh sách sản phẩm',
            'product-detail' => 'Chi tiết sản phẩm',
            'profile' => 'Trang cá nhân'
        ],
        'admin' => [
            'dashboard' => 'Thống kê',
            'products-manager' => 'Quản lý sản phẩm',
            'tags-manager' => 'Quản lý tags',
            'categories-manager' => 'Quản lý danh mục',
            'videos-manager' => 'Quản lý video',
            'banners-manager' => 'Quản lý banner',
            'notifications-manager' => 'Quản lý thông báo'
        ]
    ];

    public function index()
    {
        $displayPages = $this->displayPages;
        $notifications = AppNotification::orderBy('created_at', 'desc')->get();
        
        return view('apps.notifications.index', compact('notifications', 'displayPages'));
    }

    protected function buildDataPayload(array $fields): array
    {
        // Build a display-focused data payload from core fields
        return [
            'type' => $fields['type'] ?? 'GenericNotification',
            'title' => $fields['title'] ?? null,
            'message' => $fields['message'] ?? null,
            'category' => $fields['category'] ?? null,
            'action_url' => $fields['action_url'] ?? null,
            'priority' => (int)($fields['priority'] ?? 2),
            'channel' => $fields['channel'] ?? 'database',
            'display' => [
                'page' => $fields['is_displayed'] ?? null,
                'is_popup' => isset($fields['is_popup']) ? (bool)$fields['is_popup'] : false,
                'is_banner' => isset($fields['is_banner']) ? (bool)$fields['is_banner'] : false,
                'is_active' => isset($fields['is_active']) ? (bool)$fields['is_active'] : true,
            ],
            'meta' => [
                'sent_by' => $fields['sent_by'] ?? null,
            ],
        ];
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'type' => 'nullable|string|max:255',
                'notifiable_id' => 'nullable|integer',
                'notifiable_type' => 'nullable|string|max:255',
                'title' => 'required|string|max:255',
                'message' => 'required|string',
                'priority' => 'nullable|in:1,2,3',
                'is_active' => 'sometimes|boolean',
                'is_popup' => 'sometimes|boolean',
                'is_banner' => 'sometimes|boolean',
                'is_displayed' => 'required|string|max:255',
                'audience' => 'nullable|in:admin,user,both',
                'channel' => 'nullable|in:database,mail,push,broadcast,system',
                'category' => 'nullable|string|max:255',
                'action_url' => 'nullable|url',
                'sent_by' => 'nullable|string|max:36',
                'expires_at' => 'nullable|date',
                'is_sent' => 'sometimes|boolean',
                'read_at' => 'nullable|date',
            ]);

            $dataParsed = $this->buildDataPayload($validated);

            $payload = [
                'type' => $validated['type'] ?? 'App\\Notifications\\GenericNotification',
                'notifiable_id' => Auth::id(),
                'notifiable_type' => get_class(Auth::user()),
                'title' => $validated['title'],
                'message' => $validated['message'],
                'priority' => $validated['priority'] ?? 2,
                'is_active' => isset($validated['is_active']) ? (bool)$validated['is_active'] : true,
                'is_popup' => isset($validated['is_popup']) ? (bool)$validated['is_popup'] : false,
                'is_banner' => isset($validated['is_banner']) ? (bool)$validated['is_banner'] : false,
                'is_displayed' => $validated['is_displayed'],
                'audience' => $validated['audience'] ?? 'user',
                'channel' => $validated['channel'] ?? 'database',
                'category' => $validated['category'] ?? null,
                'action_url' => $validated['action_url'] ?? null,
                'sent_by' => $validated['sent_by'] ?? Auth::id(),
                'expires_at' => $validated['expires_at'] ?? null,
                'is_sent' => isset($validated['is_sent']) ? (bool)$validated['is_sent'] : false,
                'data' => $dataParsed,
                'read_at' => $validated['read_at'] ?? null,
            ];


            try {
                $notification = AppNotification::create($payload);
                return redirect()->route('notifications.index')
                    ->with('success', 'Thông báo đã được tạo thành công.');
            } catch (\Exception $e) {
                throw $e;
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return redirect()->route('notifications.index')
                ->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $notification = AppNotification::findOrFail($id);
        return view('apps.notifications.edit', compact('notification'));
    }

    public function update(Request $request, $id)
    {
        $notification = AppNotification::findOrFail($id);

        $validated = $request->validate([
            'type' => 'nullable|string|max:255',
            'notifiable_id' => 'nullable|integer', // Lưu user_id của ng dùng
            'notifiable_type' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'priority' => 'nullable|in:1,2,3',
            'is_active' => 'sometimes|boolean',
            'is_popup' => 'sometimes|boolean',
            'is_banner' => 'sometimes|boolean',
            'is_displayed' => 'nullable|string|max:255',
            'audience' => 'nullable|in:admin,user,both',
            'channel' => 'nullable|in:database,mail,push,broadcast,system',
            'category' => 'nullable|string|max:255',
            'action_url' => 'nullable|url',
            'sent_by' => 'nullable|string|max:36',
            'expires_at' => 'nullable|date',
            'is_sent' => 'sometimes|boolean',
            'read_at' => 'nullable|date',
        ]);

        // Determine notifiable_type and notifiable_id (same logic as store)
        $notifiableType = $validated['notifiable_type'] ?? null;
        $notifiableId = $validated['notifiable_id'] ?? null;
        if ($request->has('notifiable') && is_array($request->input('notifiable'))) {
            $notifiable = $request->input('notifiable');
            if (isset($notifiable['type']) && isset($notifiable['id'])) {
                $notifiableType = $notifiable['type'];
                $notifiableId = $notifiable['id'];
            }
        }
        if ((empty($notifiableType) || empty($notifiableId)) && Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            if (empty($notifiableType)) {
                $notifiableType = get_class($user);
            }
            if (empty($notifiableId)) {
                $notifiableId = $user->getKey();
            }
        }
        $notifiableType = $this->normalizeModelClass($notifiableType);

        // Always regenerate data payload from provided/updated fields
        $fieldsForData = array_merge($notification->toArray(), $validated);
        $dataParsed = $this->buildDataPayload($fieldsForData);

        $payload = [
            'type' => $validated['type'] ?? $notification->type,
            'notifiable_id' => $notifiableId ?? $notification->notifiable_id, // Lưu user_id của ng dùng
            'notifiable_type' => $notifiableType ?? $notification->notifiable_type,
            'title' => $validated['title'] ?? $notification->title,
            'message' => $validated['message'] ?? $notification->message,
            'priority' => $validated['priority'] ?? $notification->priority,
            'is_active' => isset($validated['is_active']) ? (bool)$validated['is_active'] : $notification->is_active,
            'is_popup' => isset($validated['is_popup']) ? (bool)$validated['is_popup'] : $notification->is_popup,
            'is_banner' => isset($validated['is_banner']) ? (bool)$validated['is_banner'] : $notification->is_banner,
            'is_displayed' => $validated['is_displayed'] ?? $notification->is_displayed,
            'audience' => $validated['audience'] ?? $notification->audience,
            'channel' => $validated['channel'] ?? $notification->channel,
            'category' => $validated['category'] ?? $notification->category,
            'action_url' => $validated['action_url'] ?? $notification->action_url,
            'sent_by' => $validated['sent_by'] ?? $notification->sent_by,
            'expires_at' => $validated['expires_at'] ?? $notification->expires_at,
            'is_sent' => isset($validated['is_sent']) ? (bool)$validated['is_sent'] : $notification->is_sent,
            'data' => $dataParsed,
            'read_at' => $validated['read_at'] ?? $notification->read_at,
        ];

        $notification->update($payload);

        return redirect()->route('notifications.index')->with('success', 'Notification updated');
    }

    public function destroy($id)
    {
        $notification = AppNotification::findOrFail($id);
        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Notification deleted');
    }

    // Optional: quick toggle active
    public function toggleActive($id)
    {
        $notification = AppNotification::findOrFail($id);
        $notification->is_active = !$notification->is_active;
        $notification->save();
        return back()->with('success', 'Notification status updated');
    }
}
