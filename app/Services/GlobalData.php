<?php
namespace App\Services;

use App\Models\Admin\Category;
use App\Models\Admin\DetailOrder;
use App\Models\Admin\MasterPrice;
use App\Models\Admin\MasterProduct;
use App\Models\Admin\Order;

class GlobalData{
    public $datatableService;
    public $dataProduct;
    public $dataCategory;
    public $dataPrice;
    public $dataDetailOrder;
    public $payment;
    public $dataOrder;
    public $statusPayment;


    public function __construct(){
        $this->datatableService = new DatatableService();
        $this->dataProduct = new MasterProduct();
        $this->dataCategory = new Category();
        $this->dataPrice = new MasterPrice();
        $this->dataDetailOrder = new DetailOrder();
        $this->payment = new PaymentService();
        $this->dataOrder = new Order();
        $this->statusPayment = new StatusPaymentService();

    }
}