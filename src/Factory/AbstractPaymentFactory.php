<?php

declare(strict_types=1);

namespace WhitePaySdk\Factory;

abstract class AbstractPaymentFactory implements PaymentFactoryInterface
{
    protected ModelFactory $factory;

    public function __construct() {
        $this->factory = new ModelFactory();
    }
}
