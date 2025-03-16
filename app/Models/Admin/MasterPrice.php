<?php

namespace App\Models\Admin;

use App\Services\AutoUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPrice extends Model
{
    use HasFactory, AutoUuid;
    protected $table = 'master_prices';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'mp_price',
        'mp_type_price',
        'mp_status',
    ];

    public function getWeekendPrice(){
        return $this->select('master_prices.id',
                    'mp_price',
                    'mp_type_price',
                    'mp_status')
        ->where('mp_type_price', 'Weekend surcharge')
        ->first();
    }
    public function getPriceWeekend(){
        return $this->where('mp_type_price', 'Weekend surcharge')->value('mp_price') ?? 0;
    }

}
