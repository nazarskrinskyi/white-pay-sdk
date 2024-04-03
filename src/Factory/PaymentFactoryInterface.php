<?php

declare(strict_types=1);

namespace WhitePaySdk\Factory;

use WhitePaySdk\DTO\DataDTOInterface;
use WhitePaySdk\Model\ModelInterface;

interface PaymentFactoryInterface
{
    public function create(DataDTOInterface $data): ModelInterface;

    public function getResponseType(): string;
}