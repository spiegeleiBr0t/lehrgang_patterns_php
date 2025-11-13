<?php

namespace Uebung\AdapterLogger;

class VendorLogger
{
    public function write(string $message, int $severity)
    {
        echo $severity. " " .$message.PHP_EOL;
    }

}