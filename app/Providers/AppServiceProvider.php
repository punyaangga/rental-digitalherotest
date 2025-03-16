<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Services\AppService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $appService;

    public function register()
    {
        // Register any bindings here if needed
    }

    public function boot()
    {
        // Cek apakah tabel app_settings ada sebelum mengaksesnya
        if (Schema::hasTable('app_settings')) {
            // Hanya akses tabel jika ada
            $appService = app(AppService::class);
            $data = $appService->getSeoData();
            View::share('setting', $data);
        }
    }
}
