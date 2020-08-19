<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

use Illuminate\Support\Facades\Date;

class BankSlip implements PaymentMethodInterface
{
    private string $dueDate;
    private array $instructionsLines = [];
    private Holder $holder;

    public function __construct()
    {
        $this->holder = new Holder;
    }
    public function toArray(): array
    {
        return [
            "type" => "BOLETO",
            "boleto" => [
                "due_date" => $this->dueDate,
                "instruction_lines" => [
                    "line_1" => $this->instructionsLines[0],
                    "line_2" => $this->instructionsLines[1]
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

    public function setDueDate(string $dueDate)
    {
        if (!\DateTime::createFromFormat('Y-m-d', $dueDate) || strlen($dueDate) != 10) {
            throw new \Exception("Error: invalid due date " . $dueDate);
        }
        $this->dueDate = $dueDate;
    }

    public function setInstructionsLines(string $lineOne, string $lineTwo)
    {
        if (strlen($lineOne) == 0 || strlen($lineOne) > 75) {
            throw new \Exception("Error: line 1 must be 1-75 characters. It has " . strlen($lineOne));
        }
        if (strlen($lineTwo) == 0 || strlen($lineTwo) > 75) {
            throw new \Exception("Error: line 2 must be 1-75 characters. It has " . strlen($lineTwo));
        }
        $this->instructionsLines[0] = $lineOne;
        $this->instructionsLines[1] = $lineTwo;
    }

    public function fillHolder(string $name, string $taxId, string $email)
    {
        $this->holder->fill($name, $taxId, $email);
    }
}
