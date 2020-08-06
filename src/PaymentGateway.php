<?php

namespace BeerAndCode\PaymentGateway;

class PaymentGateway
{
    private $acceptedMethods = [
        'Pagseguro', 'PayPal'
    ];

    public function __construct(string $method)
    {
        if (!Arr::exists($this->acceptedMethods, $method)) {
            throw new Exception("Method not accepted.", 1);
        }
        $this->initialize();
    }
}
