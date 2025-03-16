<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailOrder;
use App\Models\Admin\MasterPrice;
use App\Models\Admin\MasterProduct;
use App\Models\Admin\Order;
use App\Services\GlobalData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $globalData;
    public function __construct()
    {
        $this->globalData = new GlobalData();
    }
    public function index()
    {
        $detailOrder = $this->globalData->dataDetailOrder->getDetailOrder();
        $getWeekendPrice = $this->globalData->dataPrice->getWeekendPrice();
        $data = [
            'detailOrder' => $detailOrder,
            'weekendPrice' => $getWeekendPrice
        ];
        // dd($data);
        return view('chart.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idUser = auth()->user()->id;
        $data = $request->all();
        $data['created_by'] = $idUser;

        DetailOrder::create($data); // Simpan ke database
        return redirect()->route('chart.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, string $id)
     {
         $idOrder = $request->id_order;
         $idUser = auth()->user()->id;
         $orderNumber = "ORDER - ".rand(1000, 9999).time();
         $idProduct = Arr::flatten($request->id_product);
         $detailOrderTimeStart = (array) $request->detail_order_time_start;
         $detailOrderTimeEnd = (array) $request->detail_order_time_end;
         $detailOrderDate = (array) $request->detail_order_date;
         $duration = [];
         $totalPrice = [];


        $getWeekendPrice = $this->globalData->dataPrice->getPriceWeekend();
        $getPrice = $this->globalData->dataProduct->getOnePriceProduct($idProduct);

        foreach ($idOrder as $index => $orderId) {
            if (!isset($detailOrderTimeStart[$index], $detailOrderTimeEnd[$index], $detailOrderDate[$index], $idProduct[$index])) {
                continue;
            }

            $start = $detailOrderTimeStart[$index];
            $end = $detailOrderTimeEnd[$index];
            $date = Carbon::parse($detailOrderDate[$index]);

            // Konversi string ke timestamp
            $startTimestamp = strtotime($start);
            $endTimestamp = strtotime($end);

            // Hitung durasi dalam jam
            $diffInHours = floor(($endTimestamp - $startTimestamp) / 3600);
            $duration[$index] = $diffInHours;

            // Ambil harga produk berdasarkan ID produk
            $productId = $idProduct[$index];
            $pricePerHour = $getPrice[$productId]->mp_price ?? 0;

            // Hitung total harga
            $basePrice = $diffInHours * $pricePerHour;

            // Tambahkan biaya weekend jika hari Sabtu atau Minggu
            if ($date->isWeekend()) {
                $basePrice += $getWeekendPrice;
            }

            $totalPrice[$index] = $basePrice;


            // Perbarui data untuk ID tertentu
            DetailOrder::where('id', $orderId)->update([
                'detail_order_time_start' => $start,
                'detail_order_time_end' => $end,
                'detail_order_date' => $detailOrderDate[$index],
                'do_status'=>'checkout',
                'detail_order_price' => $basePrice,
            ]);
        }
        try{
            $grandTotalPrice = array_sum($totalPrice);
            DB::beginTransaction();
            $order = Order::create([
                'id_user' => $idUser,
                'order_number' => $orderNumber,
                'order_status' => 'waiting payment',
                'total_price' => $grandTotalPrice, // Total harga dari semua produk
            ]);
            DetailOrder::where('created_by', $idUser)->update([
                'id_order' => $order->id,
            ]);
            DB::commit();
            return $this->globalData->payment->getToken($grandTotalPrice,$orderNumber);
        }catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }

     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = DetailOrder::find($id);
        $order->delete();
        return response()->json(['success' => true]);

    }
}
