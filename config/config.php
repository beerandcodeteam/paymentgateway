<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'pagseguro' => [
        'type' => env('PAYMENT_GATEWAY_APP_TYPE', 'pagseguro'),
        'PAYMENT_GATEWAY_APP_ID' => env('PAYMENT_GATEWAY_ENV', 'app4088593308'),
        'PAYMENT_GATEWAY_APP_KEY' => env('PAYMENT_GATEWAY_ENV', '48BE7F25FEFE67DBB4292F9524496612'),
        'envinronment' => env('PAYMENT_GATEWAY_ENV', 'sandbox')
    ],

    /*
     * Providers
     */
    'providers' => [
        'pagseguro' => \BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro\PagSeguro::class,
        'paypal' => \BeerAndCodeTeam\PaymentGateway\Gateways\PayPal\PayPal::class
    ],
];
