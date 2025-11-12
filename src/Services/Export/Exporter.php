<?php

namespace Taskflow\Services\Export;

use Taskflow\Services\Export;

class Exporter
{
    private ExportStrategy $strategy;
    public function __construct(ExportStrategy $strategy){
        $this->strategy = $strategy;
    }

    public function setStrategy(ExportStrategy $strategy){
        $this->strategy = $strategy;
    }

    public function export(array $data){
        $this->strategy->export($data);
    }
}