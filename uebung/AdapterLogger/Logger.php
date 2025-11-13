<?php

namespace Uebung\AdapterLogger;

interface Logger
{   #target laut Adapter Pattern Skizze
    public function log(string $level, string $message):void;
}