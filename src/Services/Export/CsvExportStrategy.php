<?php

namespace Taskflow\Services\Export;

use Taskflow\Services\Export\ExportStrategy;

class CsvExportStrategy implements ExportStrategy
{

    public function export(array $data): string
    {
        $delimiter = ',';
        $enclosure = '"';
        $escape = '\\';

        $outBuffer = fopen('php://memory', 'w'); // öffne einen temporären memory strem in php für die Ausgabe
        foreach ($data as $row) {
            fputcsv(
                $outBuffer,
                $row,
                $delimiter, $enclosure, $escape
            );
        }
        rewind($outBuffer);
        $csvOutString = stream_get_contents($outBuffer);
        fclose($outBuffer);
        return $csvOutString;
    }
}