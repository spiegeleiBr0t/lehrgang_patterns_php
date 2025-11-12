<?php

namespace CommandSmartHoCtrl;

class SmartHome
{
    /**
     * @param SmartHomeDevice[] $smartHomeDevices
     */
    public function __construct(private array $smartHomeDevices)
    {
    }

    public function getSmartHomeDevices(): array{
        return $this->smartHomeDevices;
    }

    public function getDevicesWithStates():void
    {
        foreach ($this->smartHomeDevices as $smartHomeDevice) {
            echo $smartHomeDevice->getName()." ".$smartHomeDevice->getState().PHP_EOL;
     }
    }

}