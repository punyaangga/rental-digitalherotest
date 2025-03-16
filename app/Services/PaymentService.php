<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentService
{
    public function getToken($amount, $orderId)
    {

        $amount = $amount;

        $payload = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'credit_card' => [
                'secure' => true,
            ],
            'callbacks' => [
                'finish' => env('MIDTRANS_FINISH_URL'),
                'unfinish' => env('MIDTRANS_UNFINISH_URL'),
                'error' => env('MIDTRANS_ERROR_URL'),
            ],
        ];

        try {
            $midtransUrl = env('MIDTRANS_SNAP_URL');
            // Kirim request ke Midtrans
            $response = Http::withBasicAuth(env('MIDTRANS_SERVER_KEY'), '')
            ->acceptJson()
            ->post($midtransUrl, $payload);

            // Cek jika response sukses
            if ($response->successful()) {
                $redirectUrl = env('MIDTRANS_REDIRECT_URL') . $response->json('token');
                return redirect()->away($redirectUrl);
            } else {
                return response()->json(['error' => 'Failed to get token'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
