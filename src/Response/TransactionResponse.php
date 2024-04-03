<?php

declare(strict_types=1);

namespace WhitePaySdk\Response;

use JMS\Serializer\Annotation\SerializedName;

class TransactionResponse
{
    public function __construct(
        private string $id,

        private string $currency,

        private string $value,

        private string $status,

        #[SerializedName('hash')]
        private string $hash,

        #[SerializedName('is_internal')]
        private bool $isInternal,

        #[SerializedName('created_at')]
        private string $createdAt,

        #[SerializedName('completed_at')]
        private ?string $completedAt,
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

    public function getValue(): string
    {
        return $this->value;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function isInternal(): bool
    {
        return $this->isInternal;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function getCompletedAt(): string
    {
        return $this->completedAt;
    }
}
