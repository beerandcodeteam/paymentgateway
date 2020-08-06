<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

abstract class PagSeguroBase
{
    /** @var String $token receives PAGSEGURO_TOKEN from .env */
    protected $token = env('PAGSEGURO_TOKEN', false);

    /** @var array $headers default header for PagSeguro requests */
    protected $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => $this->token,
        'x-api-version' => '4.0',
    ];
    abstract function charge(array $values);

    abstract function findCharge(String $chargeId);

    abstract function refound(String $chargeId);
}
