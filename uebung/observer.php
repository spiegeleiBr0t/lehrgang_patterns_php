<?php

interface Observer{
    public function update(float $temperature):void;
}

interface Subject{
    public function attach(Observer $observer):void;
    public function detach(Observer $observer):void;
    public function notify():void;
}

interface SensorData{
    public function getType(): string;
    public function setType(string $type):void;

    public function ();
}

class weatherStation implements Subject{

    private array $observers=[];

    private float $temperature;

    public function __construct(float $temperature = 30.0)
    {
        $this->temperature = $temperature;
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

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->temperature);
        }
    }

    public function setTemperature(float $temperature): void {
        $this->temperature = $temperature;
        $this->notify();
    }
}

class DisplayObserver implements Observer{
    private float $temperature;

    public function __construct(float $temperature = 30.0)
    {
        $this->temperature = $temperature;
    }

    public function update(float $temperature):void{
        $this->temperature = $temperature;
        echo "Temperature Änderung in Observer ".__class__." : " .$this->temperature. " \n";
    }
}

class AlertObserver implements Observer{

    private float $temperature;
    private float $alertTemp;

    public function __construct(float $alertTemp, float $temperature = 30.0)
    {
        $this->temperature = $temperature;
        $this->alertTemp = $alertTemp;
    }

    public function update(float $temperature):void{
        $this->temperature = $temperature;
        echo "Temperature Änderung in Observer ".__class__." : " .$this->temperature. " \n";
        if($this->temperature > $this->alertTemp){
            echo "ALARM! BIDU BIDUUU NEUE TEMP $this->temperature überschreitet Alarmwert $this->alertTemp \n";
        }
    }
}

$weather = new weatherStation();

$display = new DisplayObserver();

$alarm = new AlertObserver(50);

$weather->attach($display);
$weather->attach($alarm);

$weather->setTemperature(40.8);
$weather->setTemperature(60.8);


