<?php

namespace BeerAndCodeTeam\PaymentGateway\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BeerAndCode\PaymentGateway\Skeleton\SkeletonClass
 */
class PaymentGateway extends Facade
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
