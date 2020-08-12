<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'default' => env('PG_DEFAULT', 'pagseguro'),

    'providers' => [

        'pagseguro' => [
            'provider' => 'pagseguro',
            'id' => env('PG_PAGSEGURO_ID', 'app4088593308'),
            'key' => env('PG_PAGSEGURO_KEY', '48BE7F25FEFE67DBB4292F9524496612'),
            'environment' => env('PG_ENV', 'sandbox')
        ],

        'paypal' => [
            'provider' => 'pagseguro',
            'id' => env('PG_PAGSEGURO_ID', 'app4088593308'),
            'key' => env('PG_PAGSEGURO_KEY', '48BE7F25FEFE67DBB4292F9524496612'),
            'environment' => env('PG_ENV', 'sandbox')
        ],
    ],


    'alias' => [
        'pagseguro' => \BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro\PagSeguro::class,
        'paypal' => \BeerAndCodeTeam\PaymentGateway\Gateways\PayPal\PayPal::class
    ],
];
