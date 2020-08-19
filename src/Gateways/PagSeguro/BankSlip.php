<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

use Illuminate\Support\Facades\Date;

class BankSlip implements PaymentMethodInterface
{
    private string $dueDate;
    private array $instructionsLines = [];
    private Holder $holder;
    private Adress $adress;
    public function toArray(): array
    {
        return [
            "type" => "BOLETO",
            "boleto" => [
                "due_date" => $this->dueDate,
                "instruction_lines" => [
                    "line_1" => $this->instructionsLines[0],
                    "line_2" => $this->instructionsLines[0]
                ],
                "holder" => [
                    "name" => $this->holder->getName(),
                    "tax_id" => $this->holder->getTaxId(),
                    "email" => $this->holder->getEmail(),
                    "address" => [
                        "country" => $this->adress->getCountry(),
                        "region" => $this->adress->getRegion(),
                        "region_code" => $this->adress->getRegionCode(),
                        "city" => $this->adress->getCity(),
                        "postal_code" => $this->adress->getPostalCode(),
                        "street" => $this->adress->getStreet(),
                        "number" => $this->adress->getNumber(),
                        "locality" => $this->adress->getLocality()
                    ]
                ]
            ]
        ];
    }
}
