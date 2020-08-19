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
        return [];
    }
}
