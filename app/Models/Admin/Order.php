<?php

namespace App\Models\Admin;

use App\Services\AutoUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, AutoUuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'orders';
    protected $fillable = [
            'id_user',
            'order_number',
            'order_status',
            'total_price',
            'payment_method',
            'va_number',
            'payment_url',
        ];

    public function getListOrder(){
        return $this->select(
            'order_number',
            'order_status',
            'total_price',
            'payment_method',
            'va_number',
            'payment_url',
        )
        ->where('id_user', auth()->user()->id)
        ->get();
    }

}
