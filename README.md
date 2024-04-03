# PHP WhitePay SDK
###### Simple PHP sdk for WhitePay api
### Installation
`composer require dnc-grafmen/white-pay-sdk`
### Usage
Make the `WhitePayClientFactory` and call his method `create` with parameters for create the `WhitePayClient`
#### Example
```PHP
$apikey = 2300142124;
$slug = 'my_super_secret_slug_from_account';
$factory = new \WhitePaySdk\Factory\WhitePayClientFactory();
$clientSandbox = $factory->create($apikey, $slug, new \GuzzleHttp\Client(), \WhitePaySdk\Constants::URL_SANDBOX);
// or for production
$clientProduction = $factory->create($apikey, $slug, new \GuzzleHttp\Client());
```
The next step - make the factory which implemented the `PaymentFactoryInterface`.
#### Example
```PHP
$factory = new \WhitePaySdk\Factory\CreatePaymentFactory();
```
And we also need to create a DTO that implements `DataDTOInterface`
#### Example
```PHP
$dto = new \WhitePaySdk\DTO\CreatePaymentDTO(
        new \WhitePaySdk\DTO\TransactionDTO(
            300,
            'USDT',
            '00231'
            'https://my.site.com/payment/ok', 'https://my.site.com/payment/fail'
        )
);
```
And put this data to client send method.
#### Example
```PHP
$response = $client->send($factory, $dto);
```
