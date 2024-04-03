<?php

declare(strict_types=1);

namespace WhitePaySdk\Response;

use JMS\Serializer\Annotation\SerializedName;

class StatusResponse
{
    public function __construct(
        #[SerializedName('order_id')]
        private int $orderId
    ) {
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }
}
