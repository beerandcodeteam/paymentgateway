<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class Holder
{
    private string $name;
    private string $taxId;
    private string $email;
    private Address $address;

    public function setName(string $name)
    {
        if (strlen($name) < 1  || strlen($name) > 30) {
            throw new \Exception("Error:  the name most be 1-30 characters. It has " . strlen($name));
        }
        $this->name = $name;
    }
}
