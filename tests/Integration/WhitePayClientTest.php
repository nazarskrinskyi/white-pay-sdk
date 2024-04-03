<?php

declare(strict_types=1);

namespace WhitePaySdk\Tests\Integration;

use Symfony\Component\Serializer\Serializer;
use WhitePaySdk\Constants;
use WhitePaySdk\DTO\DataDTOInterface;
use GuzzleHttp\Client;
use WhitePaySdk\Factory\PaymentFactoryInterface;
use WhitePaySdk\Factory\WhitePayClientFactory;
use WhitePaySdk\Response\ApiResponseInterface;
use WhitePaySdk\Response\CreatePaymentResponse;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class WhitePayClientTest extends TestCase
{
    use TestUtils;

    private Serializer $serializer;
    public function test__construct(): void
    {
        $this->serializer = new Serializer();
    }
    /**
     * @dataProvider sendDataProvider
     *
     * @param string                  $filenameApiResponse
     * @param PaymentFactoryInterface $paymentFactory
     * @param DataDTOInterface        $data
     * @param ApiResponseInterface    $expectedResponse
     */
    public function testSend(
        string $filenameApiResponse,
        PaymentFactoryInterface $paymentFactory,
        DataDTOInterface $data,
        ApiResponseInterface $expectedResponse
    ): void {
        $client = (new WhitePayClientFactory())->create(
            'slug',
            '123123qwqew',
            new Client(),
        );
        $response = $client->send($paymentFactory, $data);

        self::assertEquals($expectedResponse, $response);
    }

    public function sendDataProvider(): iterable
    {
        yield 'CreatePayment test' => [
            $res = $this->createResponse($this->readFileJsonPaymentResponse('createPaymentResponse.json')),
            $this->serializer->deserialize($res->getBody()->getContents(), CreatePaymentResponse::class, 'json')
        ];
    }

    private function createResponse(string $body, int $status = 200, array $headers = []): ResponseInterface
    {
        return new Response($status, $headers, $body);
    }
}
