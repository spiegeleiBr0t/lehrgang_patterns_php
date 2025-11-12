<?php

namespace Taskflow\Services\Export;

use SimpleXMLElement;
use Taskflow\Services\Export\ExportStrategy;

class XmlExportStrategy implements ExportStrategy
{

    public function export(array $data): string
    {
        // creating object of SimpleXMLElement
        $xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

        // function call to convert array to xml
        $this->array_to_xml($data,$xml_data);

        //saving generated xml file;
        $result = $xml_data->saveXML();
    }

    private function array_to_xml($data, &$xml_data ):void
    {
        foreach( $data as $key => $value ) {
            if( is_array($value) ) {
                if( is_numeric($key) ){
                    $key = 'item'.$key; //dealing with <0/>..<n/> issues
                }
                $subnode = $xml_data->addChild($key);
                $this->array_to_xml($value, $subnode);
            } else {
                $xml_data->addChild("$key",htmlspecialchars("$value"));
            }
        }
    }
}