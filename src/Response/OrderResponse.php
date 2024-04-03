<?php

declare(strict_types=1);

namespace WhitePaySdk\Response;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class OrderResponse
{
    public function __construct(
        #[SerializedName("id")]
        private string $id,

        #[SerializedName("currency")]
        private string $currency,

        #[SerializedName("expected_amount")]
        private ?float $expectedAmount,

        #[SerializedName("received_total")]
        private int $receivedTotal,

        #[SerializedName("exchange_rate")]
        private ?float $exchangeRate,

        #[SerializedName("received_currency")]
        private string $receivedCurrency,

        #[SerializedName("deposited_currency")]
        private ?string $depositedCurrency,

        private int $value,

        private string $status,

        #[SerializedName("external_order_id")]
        private string $externalOrderId,

        #[SerializedName("created_at")]
        private string $createdAt,

        #[SerializedName("completed_at")]
        private ?string $completedAt,

        #[SerializedName("acquiring_url")]
        private string $acquiringUrl,

        #[SerializedName("is_internal")]
        private ?bool $isInternal,

        #[SerializedName("order_number")]
        private string $orderNumber,

        #[Type("array<App\whitePaySdk\src\Response\TransactionResponse>")]
        private array $transactions,

        #[SerializedName("successful_link")]
        private ?string $successfulLink,

        #[SerializedName("failure_link")]
        private ?string $failureLink,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getExpectedAmount(): ?float
    {
        return $this->expectedAmount;
    }

    public function getReceivedTotal(): int
    {
        return $this->receivedTotal;
    }

    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    public function getReceivedCurrency(): string
    {
        return $this->receivedCurrency;
    }

    public function getDepositedCurrency(): ?string
    {
        return $this->depositedCurrency;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getExternalOrderId(): string
    {
        return $this->externalOrderId;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getCompletedAt(): ?string
    {
        return $this->completedAt;
    }

    public function getAcquiringUrl(): string
    {
        return $this->acquiringUrl;
    }

    public function getIsInternal(): ?bool
    {
        return $this->isInternal;
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function getSuccessfulLink(): ?string
    {
        return $this->successfulLink;
    }

    public function getFailureLink(): ?string
    {
        return $this->failureLink;
    }
}