<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $e) {
            if (request()->is('api/*')) {
                return response()->json([
                    'message' => $e->getMessage()
                ], 500);
            }
        });
    }

    public function render($request, Throwable $e)
    {
        if ($request->is('api/*')) {
            return parent::render($request, $e);
        }

        if(config('app.debug')) {
            return response()->view('errors.custom', [
                'exception' => $e,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
        }

        return parent::render($request, $e);
    }
}