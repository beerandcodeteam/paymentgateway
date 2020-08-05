<?php

namespace BeerAndCode\PaymentGateway;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BeerAndCode\PaymentGateway\Skeleton\SkeletonClass
 */
class PaymentGatewayFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'paymentgateway';
    }
}
