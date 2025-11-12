<?php

namespace Taskflow\Core;

class Configloader
{
    private static ?array $data;
    private static ?Configloader $instance = null;
    private string $confFilePath;
    private function __construct()
    {
        $this->confFilePath = __DIR__ . "/../../config/conf.json";
//        echo $this->confFilePath;
        $json = file_get_contents($this->confFilePath);
        self::$data = json_decode($json, true);
        if(self::$data === null){
            throw new \Exception('Fehler beim Laden');
        }
    }

    private function __clone() {}

    public static function getConfInstance(): self
    {
        if(!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getData()
    {
        return self::$data;
    }
}
