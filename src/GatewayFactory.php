<?php

namespace BeerAndCodeTeam\PaymentGateway;

class GatewayFactory
{
    /**
     * Methods accepted by the package
     *
     * @var array
     */
    private $acceptedMethods = [
        'PagSeguro', 'PayPal'
    ];

    /**
     * Method validated in the constructor
     *
     * @var string
     */
    private $method;

    /**
     * @param string $method
     */
    public function __construct(string $method = null)
    {
        if (!Arr::exists($this->acceptedMethods, $method)) {
            throw new Exception("Method not accepted.", 1);
        }

        $this->method = $method;

        $this->initialize();
    }

    /** Sugestão de função discutida em grupo */
    public function create(String $method)
    {
        //code here
    }
}
