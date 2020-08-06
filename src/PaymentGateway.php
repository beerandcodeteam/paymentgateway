<?php

namespace BeerAndCode\PaymentGateway;

class PaymentGateway
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
    public function __construct(string $method)
    {
        if (!Arr::exists($this->acceptedMethods, $method)) {
            throw new Exception("Method not accepted.", 1);
        }

        $this->method = $method;

        $this->initialize();
    }
}
