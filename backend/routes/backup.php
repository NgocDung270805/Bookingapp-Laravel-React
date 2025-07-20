<?php
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/download-images', function () {
    $zip = new \ZipArchive();
    $fileName = 'images_backup.zip';
    $zipPath = storage_path($fileName);

    $password = config('app.key'); // ✅ dùng APP_KEY làm mật khẩu

    if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {
        $zip->setPassword($password); // ✅ Đặt mật khẩu chung

        $rootPath = storage_path('app/public');
        $files = File::allFiles($rootPath);

        foreach ($files as $file) {
            $relativePath = Str::after($file->getPathname(), $rootPath . '/');

            $zip->addFile($file->getRealPath(), $relativePath);
            $zip->setEncryptionName($relativePath, \ZipArchive::EM_AES_256); // ✅ Mã hóa từng file bằng AES-256
        }

        $zip->close();

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

    return response()->json(['message' => 'Không thể tạo file ZIP'], 500);
});
// Chỉ cần truy cập http://127.0.0.1:8000/download-images/ 
// <=> sau đó nó tự download file zip về(bắt buộc phải giả nén ra mới có ảnh)
// <=> File Zip có password là biến APP_KEY
