<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_color extends Model
{
    use HasFactory;
    protected $fillable = ['mc_name'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function getColor()
    {
        return $this->get(['id', 'mc_name'])->toArray();
    }
}
