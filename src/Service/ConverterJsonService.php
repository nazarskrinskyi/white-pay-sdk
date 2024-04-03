<?php

declare(strict_types=1);

namespace WhitePaySdk\Service;

use WhitePaySdk\Model\ModelInterface;

class ConverterJsonService implements ConverterServiceInterface
{
    public function convertModel(ModelInterface $model): array
    {
        return $this->convertModels($model);
    }

    private function convertModels(ModelInterface $model): array
    {
        $data = [];
        foreach ($model->getChildren() as $child) {
            $data[$child->getName()] = $child->getValue();
        }

        return $data;
    }
}
