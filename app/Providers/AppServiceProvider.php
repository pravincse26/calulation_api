<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('api', function ($data = null, $status = 200, $headers = []) {
            $responseData = [
                'data' => $data,
            ];

            return response()->json($responseData, $status, $headers);
        });
    }
}
