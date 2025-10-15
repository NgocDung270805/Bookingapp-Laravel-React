<?php

namespace App\Providers;

use App\Services\MailService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(MailService::class, fn() => new MailService());
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Chỉ force HTTPS khi môi trường là production
        if (App::environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });
    }
}
