<?php

namespace Taskflow\Services\Logger;

/**
 *
 */
interface Logger
{
    /**
     * @param String $message
     * @return void
     */
    public function log(String $message):void;


}