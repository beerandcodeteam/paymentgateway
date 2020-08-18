<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class Charge
{
    private string $referenceId;
    private string $description;
    private Amount $amount;
    private PaymentMethodInterface $paymentMethod;
    private string $notificationUrls = 'https://yourserver.com/nas_ecommerce/277be731-3b7c-4dac-8c4e-4c3f4a1fdc46/';

    public function __construct(string $paymentMethod)
    {
        $this->amount = new Amount();
        $this->amount->setCurrency('BRL');
        switch ($paymentMethod) {
            case 'CreditCard':
                $this->paymentMethod = new CreditCard();
                break;
            case 'BankSlip':
                # $this->paymentMethod = new BankSlip();
                break;
            default:
                throw new \Exception("Error: payment method {$paymentMethod} not existis");
                break;
        }
    }
    public function toArray(): array
    {
        return [
            'reference_id' => $this->referenceId,
            'description' => $this->description,
            'amount' => [
                'value' => $this->amount->getValue(),
                'currency' => $this->amount->getCurrency()
            ],
            'payment_method' => $this->paymentMethod->toArray(),
            'notification_urls' => [
                $this->notificationUrls

            ]
        ];
    }
    public function setReferenceId(string $referenceId)
    {
        if (strlen($referenceId) == 0 || strlen($referenceId) > 64) {
            throw new \Exception("Error: the reference_id field must be 1-64 characters. It has " . strlen($referenceId));
        }
        $this->referenceId = $referenceId;
    }
    public function setDescription(string $description)
    {
        if (strlen($description) == 0 || strlen($description) > 64) {
            throw new \Exception("Error: the description field must be 1-64 characters. It has " . strlen($description));
        }
        $this->description = $description;
    }
    public function setValue(int $valueInCents)
    {
        $this->amount->setValue($valueInCents);
    }
    public function setCurrency(string $currency)
    {
        $this->amount->setCurrency($currency);
    }
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }
}
