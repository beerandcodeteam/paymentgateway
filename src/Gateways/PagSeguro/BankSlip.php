<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

use Illuminate\Support\Facades\Date;

class BankSlip implements PaymentMethodInterface
{
    private string $dueDate;
    private array $instructionsLines = [];
    private Holder $holder;
    private Address $address;

    public function __construct()
    {
        $this->holder = new Holder;
        $this->address = new Address;
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
                        "country" => $this->address->getCountry(),
                        "region" => $this->address->getRegion(),
                        "region_code" => $this->address->getRegionCode(),
                        "city" => $this->address->getCity(),
                        "postal_code" => $this->address->getPostalCode(),
                        "street" => $this->address->getStreet(),
                        "number" => $this->address->getNumber(),
                        "locality" => $this->address->getLocality()
                    ]
                ]
            ]
        ];
    }

    public function setDueDate(string $dueDate)
    {
        if (!preg_match('/^(20+[2-9][0-9])-(0+[1-9]|1[012])-(0+[1-9]|[12][0-9]|3[01])$/',$dueDate)) {
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

    public function fillAddress(
        string $country,
        string $region,
        string $regionCode,
        string $city,
        string $postalCode,
        string $street,
        string $number,
        string $locality
    ) {
        $this->address->setCountry($country);
        $this->address->setRegion($region);
        $this->address->setRegionCode($regionCode);
        $this->address->setCity($city);
        $this->address->setPostalCode($postalCode);
        $this->address->setStreet($street);
        $this->address->setNumber($number);
        $this->address->setLocality($locality);
    }
}
