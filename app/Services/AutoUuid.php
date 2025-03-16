<?php

namespace App\Services;

use Illuminate\Support\Str;

trait AutoUuid
{
    protected static function bootAutoUuid()
    {
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
