<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class Holder
{
    private string $name;
    private string $taxId;
    private string $email;
    //private Address $address;

    public function setName(string $name)
    {
        if (strlen($name) < 1  || strlen($name) > 30) {
            throw new \Exception("Error:  the name most be 1-30 characters. It has " . strlen($name));
        }
        $this->name = $name;
    }

    public function setTaxId(string $taxId)
    {
        if (strlen($taxId) != 11 && strlen($taxId) != 14) {
            throw new \Exception("Error: the taxId most be 11 or 14 characters. It has " . strlen($taxId));
        }
        $this->taxId = $taxId;
    }

    public function setEmail(string $email)
    {
        if (strlen($email) < 10 || strlen($email) > 255 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Error: invalid email");
        }
        $this->email = $email;
        return $this->email;
    }
}
