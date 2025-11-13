<?php

namespace Taskflow\Services\Logger;

use Taskflow\Services\Logger\Logger;

class FileLogger implements Logger
{
    use LoggerHelper;
    /**
     * @inheritDoc
     */
    public function log(string $message): void
    {
        file_put_contents(__DIR__ . '/../../../logs/app.log', $this->formatLogMessage($message) . PHP_EOL, FILE_APPEND);
    }
}