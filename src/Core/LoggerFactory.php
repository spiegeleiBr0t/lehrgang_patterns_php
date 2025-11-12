<?php

namespace Taskflow\Core;

use Taskflow\Services\Logger\ConsoleLogger;
use Taskflow\Services\Logger\FileLogger;

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
     * @return ConsoleLogger|FileLogger
     * @throws \Exception
     */
    public static function create(string $type)
    {
        switch ($type) {
            case self::FILELOGGER:
                return new FileLogger();

            case self::CONSOLELOGGER:
                return new ConsoleLogger();
            default:
                throw new \Exception("Unknown logger type");
        }
    }

}