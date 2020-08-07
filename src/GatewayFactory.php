<?php

namespace BeerAndCodeTeam\PaymentGateway;

use BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro\PagSeguro;

class GatewayFactory
{
    /**
     * Methods accepted by the package
     *
     * @var array
     */
    private $acceptedGateways = [
        'pagseguro', 'paypal'
    ];

    /**
     * Method validated in the constructor
     *
     * @var string
     */
    private $gateway;

    /**
     * @param string $method
     */
    public function create(string $gateway = null)
    {
        if (in_array($gateway, $this->acceptedGateways)) {
            $this->gateway = config('paymentgateway.providers.'.$gateway);

            return $this->initialize();
        }

        throw new \Exception("Method not accepted.", 1);
    }

    /**
     * Returns the object for the chosen gateway
     *
     * @return object
     */
    private function initialize(): object
    {
        return new $this->gateway();
    }
}
