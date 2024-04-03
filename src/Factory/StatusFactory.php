<?php

declare(strict_types=1);

namespace WhitePaySdk\Factory;

use WhitePaySdk\DTO\DataDTOInterface;
use WhitePaySdk\DTO\StatusDTO;
use WhitePaySdk\Model\ModelInterface;
use WhitePaySdk\Response\StatusResponse;

final class StatusFactory extends AbstractPaymentFactory
{
    public function create(DataDTOInterface $data): ModelInterface
    {
        assert($data instanceof StatusDTO);

        return $this->factory->create('status')
            ->addChild($this->factory->create('orderId', $data->getOrderId()));
    }

    public function getResponseType(): string
    {
        return StatusResponse::class;
    }
}
