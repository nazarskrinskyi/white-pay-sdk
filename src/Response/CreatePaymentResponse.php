<?php

declare(strict_types=1);

namespace WhitePaySdk\Response;

use JMS\Serializer\Annotation\Type;

class CreatePaymentResponse implements ApiResponseInterface
{
    public function __construct(
        #[Type('WhitePaySdk\Response\OrderResponse')]
        private OrderResponse $order
    ) {
    }

    public function getOrder(): OrderResponse
    {
        return $this->order;
    }
}
