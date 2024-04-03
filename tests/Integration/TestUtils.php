<?php

declare(strict_types=1);

namespace WhitePaySdk\Tests\Integration;

trait TestUtils
{
    protected function readFileJsonPaymentResponse(string $filename): string
    {
        $path = sprintf('%s/files/response/%s', dirname(__DIR__), $filename);

        if (!file_exists($path)) {
            throw new \Exception(sprintf('The file %s does\'nt found', $path));
        }

        return file_get_contents($path);
    }
}