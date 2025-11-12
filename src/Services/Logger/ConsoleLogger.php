<?php

namespace Taskflow\Services\Logger;

use Taskflow\Services\Logger\Logger;

class ConsoleLogger implements Logger
{
    use LoggerHelper;

    /**
     * @inheritDoc
     */
    public function log(string $message): void
    {
        echo $this->formatLogMessage($message) . PHP_EOL;
    }
}