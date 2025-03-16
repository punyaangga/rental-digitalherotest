<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Services\GlobalData;
use Illuminate\Support\Facades\Http;


class BookingController extends Controller
{
    private $globalData;
    public function __construct()
    {
        $this->globalData = new GlobalData();
    }
    public function index()
    {
        $getListOrder = $this->globalData->dataOrder->getListOrder();
        $data = [
            'listOrder' => $getListOrder,
        ];
        $orderId = request('order_id');
        $getStatus = $this->globalData->statusPayment->checkPaymentStatus($orderId);
        $responseArray = json_decode($getStatus->getContent(), true);
        $va = data_get($responseArray, 'data.va_numbers.0.va_number', 'unknown');
        $bank = data_get($responseArray, 'data.va_numbers.0.bank', 'unknown');
        $transactionStatus = data_get($responseArray, 'data.transaction_status', 'unknown');
        $this->update($orderId,$va,$transactionStatus,$bank);
        return view('booking.index', compact('data'));

    }
    public function update($orderNumber,$va,$status,$bank){
        switch ($status) {
            case 'settlement':
                $status = 'payment success';
                break;
            case 'capture':
                $status = 'payment success';
                break;
            case 'pending':
                $status = 'pending';
                break;
            case 'expire':
                $status = 'expire';
                break;
            case 'failure':
                $status = 'failure';
                break;
            default:
                $status = 'waiting payment';
                break;
        }
        Order::where('order_number', $orderNumber)->update([
            'order_status' => $status,
            'va_number' => $va,
            'payment_method' => $bank,


        ]);
    }



}
