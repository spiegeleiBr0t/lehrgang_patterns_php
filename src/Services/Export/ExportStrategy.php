<?php

namespace Taskflow\Services\Export;

interface ExportStrategy
{
    public function export(array $data):string;
}