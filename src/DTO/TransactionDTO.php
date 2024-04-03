<?php

declare(strict_types=1);

namespace WhitePaySdk\DTO;

class TransactionDTO implements DataDTOInterface
{
    /**
     * @param int $amount
     * @param string $currency
     * @param string|null $externalOrderId
     * @param string|null $successfulLink
     * @param string|null $failureLink
     */
    public function __construct(
        private int $amount,
        private string $currency,
        private ?string $externalOrderId = null,
        private ?string $successfulLink = null,
        private ?string $failureLink = null,
    ) {}

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getExternalOrderId(): ?string
    {
        return $this->externalOrderId;
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
