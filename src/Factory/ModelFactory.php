<?php

declare(strict_types=1);

namespace WhitePaySdk\Factory;

use WhitePaySdk\Model\Model;
use WhitePaySdk\Model\ModelInterface;

class ModelFactory
{
    public function create(string $name, int|string|null $value = null): ModelInterface
    {
        return new Model($name, $value);
    }
}
