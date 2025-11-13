<?php

namespace Uebung\AdapterLogger;

use Uebung\AdapterLogger\Logger;

class VendorLoggerAdapter implements Logger
{
    private VendorLogger $vendorLogger;
    public function __construct()
    {
        $this->vendorLogger = new VendorLogger();
    }

    public function log(string $level, string $message): void
    {
        $severityMap =  array_flip(['info','warning', 'error', 'alert' ,'critical', 'emergency' ]);
        $this->vendorLogger->write($message,$severityMap[$level]);
    }

}