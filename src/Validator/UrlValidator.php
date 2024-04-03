<?php

declare(strict_types=1);

namespace WhitePaySdk\Validator;

use WhitePaySdk\Constants;
use WhitePaySdk\Exceptions\PaymentException;

final class UrlValidator
{
    /**
     * @param string $url
     *
     * @throws PaymentException
     */
    public static function validateAndThrowPaymentException(string $url): void
    {
        if (!self::validate($url)) {
            throw PaymentException::urlIsNotAllowed($url);
        }
    }

    private static function validate(string $url): bool
    {
        return in_array($url, Constants::availableUrls(), true);
    }
}
