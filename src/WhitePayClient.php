<?php

declare(strict_types=1);

namespace WhitePaySdk;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use WhitePaySdk\DTO\DataDTOInterface;
use WhitePaySdk\Factory\PaymentFactoryInterface;
use WhitePaySdk\Response\ApiResponseInterface;
use WhitePaySdk\Response\CreatePaymentResponse;
use WhitePaySdk\Service\ConverterJsonService;
use WhitePaySdk\Service\ResponseTransformService;

final class WhitePayClient
{
    public function __construct(
        private string $slug,
        private string $apiKey,
        private ClientInterface $guzzleClient,
        private string $apiEndpoint
    ) {
    }

    public function send(PaymentFactoryInterface $paymentFactory, DataDTOInterface $data): ApiResponseInterface
    {
        $model = $paymentFactory->create($data);

        $serviceJson = new ConverterJsonService();
        $data = $serviceJson->convertModel($model);

        $path = sprintf('%s/%s', $this->apiEndpoint, $this->slug);

        $response = $this->guzzleClient->request(Constants::HTTP_POST_METHOD, $path, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey
            ],
            RequestOptions::JSON => $data,
        ]);

        return (new ResponseTransformService())->convertResponse($response, $paymentFactory->getResponseType());
    }

    public function complete(string $orderId): ApiResponseInterface
    {
        $path = sprintf('%s/%s/%s/%s', $this->apiEndpoint, $this->slug, $orderId, 'complete');

        $response = $this->guzzleClient->request(Constants::HTTP_POST_METHOD, $path, [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey
            ],
        ]);

        return (new ResponseTransformService())->convertResponse($response, CreatePaymentResponse::class);
    }
}
