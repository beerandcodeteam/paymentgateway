<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class Amount
{
    private $valueInCents;
    private $currency;

    public function setValue(int $valueInCents)
    {
        if ($valueInCents < 0) {
            throw new \Exception("Error: the value cannot be less than 0");
        }
        if (strlen($valueInCents) > 9) {
            throw new \Exception("Error: the value must be a maximum of 9 digits. It has " . strlen($valueInCents));
        }
        $this->valueInCents = $valueInCents;
    }
    public function setCurrency(string $currency)
    {
        if (strlen($currency) != 3) {
            throw new \Exception("Error: Currency code must be three letters");
        }
        $this->currency = strtoupper($currency);
    }
    public function getValue()
    {
        return $this->valueInCents;
    }
    public function getCurrency()
    {
        return $this->currency;
    }
}
