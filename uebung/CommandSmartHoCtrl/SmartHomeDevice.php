<?php

namespace CommandSmartHoCtrl;

class SmartHomeDevice
{
    private bool $state = false;
    public function __construct(private string $name,private DeviceType $deviceType){
    }
    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name): void{
        $this->name = $name;
    }
    public function getDeviceType(): DeviceType{
        return $this->deviceType;
    }
    public function getState():bool{
        return $this->state;
    }
    public function toggleState():bool
    {
        $this->state = !$this->state;
        return $this->state;
    }
}