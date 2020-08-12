<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

use Illuminate\Support\Facades\Http;

class PagSeguro extends PagSeguroBase
{
    public function pay()
    {
        return 'Pagando com pagseguro';
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
}
