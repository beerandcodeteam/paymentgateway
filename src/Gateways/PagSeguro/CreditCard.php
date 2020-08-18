<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class CreditCard implements PaymentMethodInterface
{
    private int $installments;
    private bool $capture;
    private string $cardNumber;
    private string $cardExpMonth;
    private string $cardExpYear;
    private string $cardSecurityCode;
    private string $holderName;

    public function toArray(): array
    {
        return [
            'type' => 'CREDIT_CARD',
            'installments' => $this->installments,
            'capture' => $this->capture,
            'card' => [
                'number' => $this->cardNumber,
                'exp_month' => $this->cardExpMonth,
                'exp_year' => $this->cardExpYear,
                'security_code' => $this->cardSecurityCode,
                'holder' => [
                    'name' => $this->holderName
                ]
            ]
        ];
    }
    public function setInstallments(int $installments)
    {
        if ($installments < 0) {
            throw new \Exception("Error installment less than zero ", $installments);
        }
        $this->installments = $installments;
    }
    public function setCapture(bool $capture)
    {
        $this->capture = $capture;
    }
    public function setCardNumber(string $cardNumber)
    {
        if (strlen($cardNumber) < 14 || 19 < strlen($cardNumber)) {
            throw new \Exception("Error card number " . strlen($cardNumber) . " digits");
        }
        $this->cardNumber = $cardNumber;
    }
    public function setCardExpMonth(string $cardExpMonth)
    {
        if (intval($cardExpMonth) < 0 || 13 < intval($cardExpMonth)) {
            throw new \Exception("Error invalid month", $cardExpMonth);
        }
        $this->cardExpMonth = $cardExpMonth;
    }
    public function setCardExpYear(string $cardExpYear)
    {
        if (intval($cardExpYear) < 2018) {
            throw new \Exception("Error invalid year ", $cardExpYear);
        }
        $this->cardExpYear = $cardExpYear;
    }
    public function setCardSecurityCode(string $cardSecurityCode)
    {
        if (strlen($cardSecurityCode) < 3 || 4 < strlen($cardSecurityCode)) {
            throw new \Exception("Error: security code must be 3 or 4 digits. It has " . strlen($cardSecurityCode) . " digits");
        }
        $this->cardSecurityCode = $cardSecurityCode;
    }
    public function setHolderName(string $holderName)
    {
        $this->holderName = $holderName;
    }
    public function fill(
        bool $capture,
        int $installments,
        string $cardNumber,
        string $cardExpMonth,
        string $cardExpYear,
        string $cardSecurityCode,
        string $holderName
    ) {
        $this->setCapture($capture);
        $this->setInstallments($installments);
        $this->setCardNumber($cardNumber);
        $this->setCardExpMonth($cardExpMonth);
        $this->setCardExpYear($cardExpYear);
        $this->setCardSecurityCode($cardSecurityCode);
        $this->setHolderName($holderName);
    }
}
