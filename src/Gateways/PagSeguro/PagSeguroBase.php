<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class PagSeguroBase
{
    /** @var String $token receives PAGSEGURO_TOKEN from .env */
    protected $token = env('PAGSEGURO_TOKEN', false);
}
