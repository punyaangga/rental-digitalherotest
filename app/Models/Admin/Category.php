<?php

namespace App\Models\Admin;

use App\Services\AutoUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use HasFactory, AutoUuid;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'category_name',
        'category_description',
        'category_status',
    ];

    public function getCategory(){
        return $this->select('categories.id','category_name','mp_price')
        ->leftJoin('master_prices','categories.id','=','master_prices.id_categories')
        ->where('category_status', '1')
        ->get();
    }
}
