<?php

namespace App\Models\Setting;

use App\Services\AutoUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory, AutoUuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'app_settings';
    protected $fillable = ['app_values','app_category'];

}
