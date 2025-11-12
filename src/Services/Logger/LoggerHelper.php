<?php

namespace Taskflow\Services\Logger;

trait LoggerHelper
{
    public function formatLogMessage(string $message): string
    {
        return sprintf('[%s] %s', date('Y-m-d H:i:s'), $message);
    }

}