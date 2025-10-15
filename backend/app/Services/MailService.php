<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class MailService
{
    /**
     * Gửi mail đến người dùng, đồng thời gửi kèm admin & manager trong hệ thống.
     */
    public function send($to, $subject, $view, $data = [])
    {
        try {
            // Lấy danh sách email của admin & manager từ DB
            $notifyEmails = User::role(['admin', 'manager'])
                ->whereNotNull('email')
                ->pluck('email')
                ->toArray();

            Mail::send($view, $data, function ($message) use ($to, $subject, $notifyEmails) {
                $message->to($to)
                        ->subject($subject)
                        ->from(config('mail.from.address'), config('mail.from.name'));

                // Gửi thêm cho admin & manager
                if (!empty($notifyEmails)) {
                    $message->cc($notifyEmails);
                }
            });

            return true;
        } catch (Exception $e) {
            Log::error('Mail send failed: ' . $e->getMessage());
            return false;
        }
    }
}
