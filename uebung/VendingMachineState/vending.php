<?php
require_once __DIR__ . '../../vendor/autoload.php';

while (true) {
    echo "Bitte gib etwas ein ('exit' zum Beenden, '?' oder 'help' für Hilfe - alles ohne Anführungszeichen): ";
    //$input = trim(fgets(readline('>')));
    $input = trim(fgets(STDIN));

    if (strtolower($input) === 'exit') {
        echo "Programm beendet.\n";
        break;
    }

    echo "Du hast eingegeben: $input\n";
}