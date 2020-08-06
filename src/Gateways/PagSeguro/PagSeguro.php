<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

use Illuminate\Support\Facades\Http;

class PagSeguro extends PagSeguroBase
{

    function charge(array $values)
    {
        $response = Http::withHeaders([
            $this->headers
        ])->post(
            'https://sandbox.api.pagseguro.com/charges',
            [
                'reference_id' => 'ex-00001',
                'description' => 'Celular',
                'amount' => [
                    'value' => 100000,
                    'currency' => 'BRL'
                ],
                'payment_method' => [
                    'type' => 'CREDIT_CARD',
                    'installments' => 1,
                    'capture' => true,
                    'card' => [
                        'number' => '4111111111111111',
                        'exp_month' => '12',
                        'exp_year' => '2026',
                        'security_code' => '123',
                        'holder' => [
                            'name' => 'Silveirinha'
                        ]
                    ]
                ],
                'notification_urls' => [
                    'https://yourserver.com/nas_ecommerce/277be731-3b7c-4dac-8c4e-4c3f4a1fdc46/'
                ]
            ]
        );

        return $response->json();
    }
    public function findCharge(string $chargeId)
    {
        $response = Http::withHeaders([
            $this->headers
        ])->get('https://sandbox.api.pagseguro.com/charges/' . $chargeId,);
        return $response;
    }
    public function refound(string $chargeId)
    {
        $response = Http::withHeaders([
            $this->headers
        ])->post('https://sandbox.api.pagseguro.com/charges/'.$chargeId.'/cancel', [
            'amount' => [
                'value' => 99500, // value for refund
                'sumary' => [
                    'refunded' => true
                ]
            ]
        ]);
        return $response;
    }
}
