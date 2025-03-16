<?php

namespace App\Models\Admin;

use App\Services\AutoUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailOrder extends Model
{
    use HasFactory, AutoUuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'detail_orders';

    protected $fillable = [
        'id_order',
        'id_product',
        'created_by',
        'detail_order_date',
        'detail_order_time',
        'detail_order_price',
        'payment_method',
        'do_status',
    ];

    public function getDetailOrder(){
        return $this->select('detail_orders.id',
                    'id_product',
                    'id_order',
                    'detail_orders.created_by',
                    'ms_product_name',
                    'ms_product_image',
                    'mp_price',
                    'category_name')
        ->leftJoin('master_products','detail_orders.id_product','=','master_products.id')
        ->leftJoin('categories','master_products.id_category','=','categories.id')
        ->leftJoin('master_prices','categories.id','=','master_prices.id_categories')
        ->where('detail_orders.created_by',auth()->user()->id)
        ->where('detail_orders.do_status','chart')
        ->get();
    }


}
