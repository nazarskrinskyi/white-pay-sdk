<?php

declare(strict_types=1);

namespace WhitePaySdk\Service;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use WhitePaySdk\Exceptions\PaymentException;
use WhitePaySdk\Response\ApiResponseInterface;
use Psr\Http\Message\ResponseInterface;

class ResponseTransformService
{
    private SerializerInterface $serializer;

    public function __construct()
    {
        $this->serializer = $this->createSerializer();
    }

    private function createSerializer(): SerializerInterface
    {
        $builder = new SerializerBuilder();

        return $builder->build();
    }

    public function convertResponse(ResponseInterface $response, string $type): ApiResponseInterface
    {
        $data = $response->getBody()->getContents();

        if ($response->getStatusCode() >= 400) {
            throw new PaymentException(
                sprintf(
                    'Error from API: %s',
                    $data
                ),
                $response->getStatusCode()
            );
        }

        assert(array_key_exists(ApiResponseInterface::class, class_implements($type)));

        return $this->serializer->deserialize($data, $type, 'json');
    }
}