<?php

#Implementor -WIE wird etwas generiert
#    ReportOutput >Typen PlainTextOutput, JsonOut
interface ReportOutput{
    public function render(string $title, array $sections):void;
}

class PlainTextOutput implements ReportOutput
{
    public function render(string $title, array $sections): void
    {
        echo $title . ":" . PHP_EOL;
        foreach ($sections as $section) {
            echo $section . PHP_EOL;
        }
    }
}
class JsonOutput implements ReportOutput{

    public function render(string $title, array $sections): void
    {

        echo
        json_encode(
        [
            "title" => $title,
            "sections" => $sections
        ],
            JSON_PRETTY_PRINT
        );
    }
}

# Abstraktion  - WAS passiert Fachlich
#
abstract class Report{
    public function __construct(
        protected ReportOutput $output,
        protected array $sections =[]
    )
    {}
    public function addSection(string $title, string $body){
        $this->sections[] = [$title  => $body];
    }
    abstract public function deliver(): void;
}

#Refined Abstraction - Spezialisierung aus WIE + WAS

class StatusReport extends Report{

    public function deliver(): void
    {

    }
}
class AuditReport extends Report{

    public function deliver(): void
    {
        $this->
    }
}
