<?php

declare(strict_types=1);

namespace WhitePaySdk;

final class Constants
{
    public const URL_LIVE = 'https://api.whitepay.com/private-api/crypto-orders';
    public const OPEN_STATUS = 'OPEN';
    public const INIT_STATUS = 'INIT';
    public const DECLINED_STATUS = 'DECLINED';
    public const FAILED_STATUS = 'FAILED';
    public const COMPLETE_STATUS = 'COMPLETE';
    public const HTTP_POST_METHOD = 'POST';

    public static function availableUrls(): array
    {
        return [self::URL_LIVE];
    }
}
