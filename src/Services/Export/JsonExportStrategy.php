<?php

namespace Taskflow\Services\Export;

class JsonExportStrategy implements ExportStrategy
{

    public function export(array $data): string
    {
        return json_encode($data);
    }
}