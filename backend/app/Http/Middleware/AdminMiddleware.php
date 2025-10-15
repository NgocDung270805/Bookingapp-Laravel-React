<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user() || !auth()->user()->hasRole('admin')) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập. Chỉ Admin mới được phép truy cập trang này.');
        }

        return $next($request);
    }
}