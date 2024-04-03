<?php

declare(strict_types=1);

namespace WhitePaySdk\Service;

use WhitePaySdk\Model\ModelInterface;

interface ConverterServiceInterface
{
    public function convertModel(ModelInterface $model): array;
}
