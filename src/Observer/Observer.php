<?php

namespace Taskflow\Observer;

interface Observer
{
    public function update(EventType $event, mixed $data):void;
}