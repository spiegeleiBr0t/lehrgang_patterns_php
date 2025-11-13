<?php

namespace Taskflow\Core;

use Exception;
use Taskflow\Services\Logger\ConsoleLogger;
use Taskflow\Services\Logger\FileLogger;
use Taskflow\Services\Logger\Logger;

/**
 *
 */
class LoggerFactory
{
    public static function create(string $type): Logger
    {
        return match ($type) {
            'file' => new FileLogger(),
            'console' => new ConsoleLogger(),
            default => throw new \InvalidArgumentException('Unknown logger type'),
        };
    }
}