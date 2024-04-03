<?php

declare(strict_types=1);

namespace WhitePaySdk\Exceptions;

use DomainException;

class PaymentException extends DomainException
{
    public static function urlIsNotAllowed(string $url): self
    {
        return new self(sprintf('This url is not available. The received url is %s', $url), 500);
    }
}
