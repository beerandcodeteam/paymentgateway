<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

use Illuminate\Support\Facades\Http;

class PagSeguro extends PagSeguroBase
{
    public function pay(Charge $charge)
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->post($this->baseUrl.'charges', $charge->toArray());
                return collect($response->json());
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function searchByTransactionCode(String $transactionCode)
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->get($this->baseUrl . 'charges/' . $transactionCode);
            return collect($response->json());
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function refund(string $transactionCode, int $refundAmount)
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->post($this->baseUrl . 'charges/' . $transactionCode . '/cancel', [
                    'amount' => [
                        'value' => $refundAmount
                    ]
                ]);
            return collect($response->json());
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function capture(string $transactionCode, int $amount)
    {
        try {
            $response = Http::withHeaders($this->headers)
                ->post($this->baseUrl . 'charges/' . $transactionCode . '/capture',[
                    'amount' => [
                        'value' => $amount
                    ]
                ]);
            return collect($response->json());
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
