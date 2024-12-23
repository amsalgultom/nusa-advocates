<?php

namespace App\Exceptions;
use App\Models\Log;
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
            $user = auth()->check() ? auth()->user()->id : 'guest';
            $now = date('Y-m-d H:i:s');
            Log::create([
                'url' => request()->fullUrl(),
                'body' => request()->getContent(),
                'message' => $e->getMessage(),
                'created_by' => $user
            ]);
        });
    }
}
