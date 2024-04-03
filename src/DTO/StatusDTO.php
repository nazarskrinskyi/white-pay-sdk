<?php

declare(strict_types=1);

namespace WhitePaySdk\DTO;

final class StatusDTO
{
    public function __construct(private string $orderId)
    {
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }
}
