<?php

namespace App\Models\Admin;

use App\Services\AutoUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduct extends Model
{
    use HasFactory, AutoUuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'master_products';
    protected $fillable = [
        'id_price',
        'id_category',
        'ms_product_name',
        'ms_product_description',
        'ms_product_image',
        'ms_product_meta_description',
        'ms_product_meta_keyword',
    ];

    public function getProduct(){
        return $this->select('master_products.id',
                    'ms_product_name',
                    'ms_product_image',
                    'ms_product_description',
                    'ms_product_meta_keyword',
                    'ms_product_meta_description',
                    'mp_price',
                    'category_name')
        ->leftJoin('categories','master_products.id_category','=','categories.id')
        ->leftJoin('master_prices','categories.id','=','master_prices.id_categories')
        ->get();
    }

    public function getOnePriceProduct($idProduct){
        return $this->select(
            'master_products.id',
            'mp.mp_price',
            'categories.category_name'
        )
        ->leftJoin('categories', 'master_products.id_category', '=', 'categories.id')
        ->leftJoin('master_prices as mp', 'categories.id', '=', 'mp.id_categories')
        ->whereIn('master_products.id', $idProduct)
        ->get()
        ->keyBy('id');
    }
}
