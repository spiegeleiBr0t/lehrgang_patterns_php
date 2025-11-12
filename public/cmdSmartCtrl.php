<?php

use CommandSmartHoCtrl\DeviceType;
use CommandSmartHoCtrl\RemoteCtrlManager;
use CommandSmartHoCtrl\SmartHomeDevice;

$lampe1 = new SmartHomeDevice("Licht1", DeviceType::light);
$lampe2 = new SmartHomeDevice("Licht2", DeviceType::light);
$heater1 = new SmartHomeDevice("Heizung1", DeviceType::heater);
$heater2 = new SmartHomeDevice("Heizung2", DeviceType::heater);

$ctrl = new RemoteCtrlManager();