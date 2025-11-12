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
    /**
     *
     */
    public const FILELOGGER = "filelogger";
    /**
     *
     */
    public const CONSOLELOGGER = "consolelogger";

    /**
     * @param string $type
     * @return Logger
     * @throws Exception
     */
    public static function create(string $type): Logger
    {
        return match ($type) {
            self::FILELOGGER => new FileLogger(),
            self::CONSOLELOGGER => new ConsoleLogger(),
            default => throw new Exception("Unknown logger type"),
        };
    }

}