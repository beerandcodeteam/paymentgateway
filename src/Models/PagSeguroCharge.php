<?php

namespace BeerAndCodeTeam\PaymentGateway\Models;

class PagSeguroCharge
{
    private $referenceId;
    private $description;
    private $amount = array();
    private $paymentMethod = array();
    private $notificationUrls = array();
    /**
     * setReferenceId
     * 
     * Set your internal order id
     *
     * @param String $referenceId your internal order id
     **/
    public function setReferenceId(String $referenceId)
    {
        $this->referenceId = $referenceId;
    }
    /**
     * setDescripition
     * 
     * Set your order description
     *
     * @param String $description your order description
     **/
    public function setDescripition(String $description)
    {
        $this->description = $description;
    }
    /**
     * Set total amount order and the currency
     * At this time only BRL is supported
     * @param int $value total amount order
     * @param string $currency set a currency with only 3 letters
     **/
    public function setAmount(int $value, string $currency = 'BRL')
    {
        $this->amount = array(
            'value' => $value,
            'currency' => $currency
        );
    }
    /**
     * setPaymentwithCreditCard
     *
     * Defines the credit card for payment
     *
     * @param bool $capture false for only pre-authorize or true for payment in only one step
     * @return void
     **/
    public function setPaymentWithCreditCard(
        int $installments,
        bool $capture = true,
        string $cardNumber,
        string $cardExpireMonth,
        string $cardExpireYear,
        string $cardSecurityCode,
        string $cardHolderName
    ) {
        $this->paymentMethod = array(
            'type' => 'CREDIT_CARD',
            'intallments' => $installments,
            'capture' => $capture,
            'card' => array(
                'number' => $cardNumber,
                'exp_month' => $cardExpireMonth,
                'exp_year' => $cardExpireYear,
                'security_code' => $cardSecurityCode,
                'holder' => array('name' => $cardHolderName)
            )
        );
    }
    /**
     * setPaymentWithBillet
     *
     * Defines the billet for payment
     * @return void
     **/
    public function setPaymentWithBillet(
        string $date,
        string $instructionLine1,
        string $instructionLine2,
        string $name,
        string $taxId,
        string $email,
        string $country,
        string $region,
        string $regionCode,
        string $city,
        string $postalCode,
        string $street,
        string $number,
        string $locality
    ) {
        $this->paymentMethod = array(
            'payment_method' => 'BOLETO',
            'boleto' => array(
                'due_date' => $date,
                'instruction_lines' => array(
                    'line_1' => $instructionLine1,
                    'line_2' => $instructionLine2
                ),
                'holder' => array(
                    'name' => $name,
                    'tax_id' => $taxId,
                    'email' => $email,
                    'adress' => array(
                        'country' => $country,
                        'region' => $region,
                        'region_code' => $regionCode,
                        'city' => $city,
                        'postal_code' => $postalCode,
                        'street' => $street,
                        'number' => $number,
                        'locality' => $locality
                    )
                )
            )
        );
    }
    /**
     * setNotificationUrls
     *
     * Defines links for notification
     *
     * @param array $notificationUrls an array with links for notification
     **/
    public function setNotificationUrls(array $notificationUrls)
    {
        $this->notificationUrls = $notificationUrls;
    }
    /**
     * getChargeData
     *
     * returns an array with charge data
     *
     * @return array
     **/
    public function getChargeData()
    {
        return array(
            'reference_id' => $this->referenceId,
            'description' => $this->description,
            'amount' => $this->amount,
            'payment_method' => $this->paymentMethod,
            'notification_urls' => $this->notificationUrls
        );
    }
}
