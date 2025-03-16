<?php
// service ini digunakan untuk menyebarkan data app ke semua view
// dimana service ini di panggil di app service
namespace App\Services;
use App\Models\Setting\AppSetting;
class AppService
{
    public function getSeoData()
    {
        return AppSetting::get(['app_values', 'app_category'])->toArray();
    }
}
