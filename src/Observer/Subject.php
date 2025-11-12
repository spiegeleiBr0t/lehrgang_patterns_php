<?php

namespace Taskflow\Observer;

interface Subject
{
    public function attach(Observer $observer):void;
    public function detach(Observer $observer):void;
    public function notify(EventType $eventType, mixed $data):void;
}