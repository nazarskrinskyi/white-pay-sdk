<?php

declare(strict_types=1);

namespace WhitePaySdk\Factory;

use WhitePaySdk\DTO\DataDTOInterface;
use WhitePaySdk\DTO\TransactionDTO;
use WhitePaySdk\Model\ModelInterface;
use WhitePaySdk\Response\CreatePaymentResponse;

class CreateTransactionFactory extends AbstractPaymentFactory
{
    public function create(DataDTOInterface $data): ModelInterface
    {
        assert($data instanceof TransactionDTO);

        return $this->factory->create('transaction')
            ->addChild($this->factory->create('amount', $data->getAmount()))
            ->addChild($this->factory->create('currency', $data->getCurrency()))
            ->addChild($this->factory->create('external_order_id', $data->getExternalOrderId()))
            ->addChild($this->factory->create('successful_link', $data->getSuccessfulLink()))
            ->addChild($this->factory->create('failure_link', $data->getFailureLink()));
    }

    public function getResponseType(): string
    {
        return CreatePaymentResponse::class;
    }
}
