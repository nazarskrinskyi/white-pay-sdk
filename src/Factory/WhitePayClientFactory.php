<?php

declare(strict_types=1);

namespace WhitePaySdk\Factory;

use GuzzleHttp\ClientInterface;
use WhitePaySdk\Constants;
use WhitePaySdk\WhitePayClient;
use WhitePaySdk\Validator\UrlValidator;

class WhitePayClientFactory
{
    public function create(
        string $slug,
        string $apiKey,
        ClientInterface $client,
        string $apiEndpoint = Constants::URL_LIVE,
    ): WhitePayClient {
        UrlValidator::validateAndThrowPaymentException($apiEndpoint);

        return new WhitePayClient(
            $slug,
            $apiKey,
            $client,
            $apiEndpoint,
        );
    }
}
