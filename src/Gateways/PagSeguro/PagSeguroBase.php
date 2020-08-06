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
    /**
     * Request in api point /charges using method POST
     *
     * @param Array $Values Receives params for charge
     * @return json
     **/
    abstract function charge(array $values);

    /**
     * Request in api point /charges/$chargeid using method GET
     *
     * @param String $chageId Receives id of charge PagSeguro
     * @return json
     **/
    abstract function findCharge(String $chargeId);

    /**
     * Request in api point /charges/$chargeid/cancel using method POST
     *
     * @param String $chageId Receives id of charge PagSeguro
     * @return json
     **/
    abstract function refound(String $chargeId);
}
