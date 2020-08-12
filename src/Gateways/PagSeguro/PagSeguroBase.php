<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class PagSeguroBase
{
    /** @var String $token receives PG_PAGSEGURO_KEY from .env */
    protected $token;

    /** @var array $headers default header for PagSeguro requests */
    protected $headers;

    /** @var array $baseUrl base url for pagseguro api */
    protected $baseUrl = 'https://sandbox.api.pagseguro.com/';

    public function __construct()
    {
        $this->token = config('paymentgateway.providers.pagseguro.key');

        $this->headers = [
            'Content-Type' => 'application/json',
            'Authorization' => $this->token,
            'x-api-version' => '4.0',
        ];

        if (strtolower(config('paymentgateway.providers.pagseguro.environment')) == 'production') {
            $this->baseUrl = 'https://api.pagseguro.com/';
        }
    }
}
