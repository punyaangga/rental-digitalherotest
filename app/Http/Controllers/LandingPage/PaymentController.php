<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function getToken(Request $request)
    {
        $orderId = 'ORDER-' . time();
        $amount = $request->input('amount', 10000); // Default 10.000 jika tidak ada input

        $payload = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'credit_card' => [
                'secure' => true,
            ],
        ];

        try {
            // Kirim request ke Midtrans
            $response = Http::withBasicAuth(config('midtrans.server_key'), '')
                ->acceptJson()
                ->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $payload);

            // Cek jika response sukses
            if ($response->successful()) {
                return response()->json(['token' => $response->json('token')]);
            } else {
                return response()->json(['error' => 'Failed to get token'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
