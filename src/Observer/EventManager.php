<?php

namespace Taskflow\Observer;

use Taskflow\Observer\EventType;
use Taskflow\Observer\Subject;
use Taskflow\Observer\Observer;

class EventManager implements Subject
{
    private static ?EventManager $instance = null;
    private array $observers=[];
    private function __construct()
    {}
    public static function getInstance(): EventManager
    {
        if (self::$instance === null) {
            self::$instance = new EventManager();
        }
        return self::$instance;
    }
    public function attach(Observer $observer): void
    {
        if (!in_array($observer, $this->observers, true)) { // strikte Prüfung mit drittem Parameter
            $this->observers[] = $observer;
        }
    }

    public function detach(Observer $observer): void
    {
        $this->observers = array_filter($this->observers, fn($obs)=>$obs !== $observer);
    }

    public function notify(EventType $eventType, mixed $data): void
    {
        foreach ($this->observers as $observer) {
            $observer->update( $eventType, $data);
        }
    }

}