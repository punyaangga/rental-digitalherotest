<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatusPaymentService{
    public function checkPaymentStatus($orderId)
    {

        $url = "https://api.sandbox.midtrans.com/v2/{$orderId}/status";

        try {
            // Kirim permintaan ke Midtrans menggunakan autentikasi Basic Auth
            $response = Http::withBasicAuth(env('MIDTRANS_SERVER_KEY'), '')
                ->get($url);

            // Periksa jika request gagal
            if ($response->failed()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to retrieve payment status',
                    'error' => $response->body()
                ], $response->status());
            }

            // Ambil data JSON dari response
            $statusData = $response->json();

            return response()->json([
                'success' => true,
                'message' => 'Payment status retrieved successfully',
                'data' => $statusData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving payment status',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
