<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PSpell\Config;
use Taskflow\Core\Database;
use Taskflow\Core\Configloader;
use Taskflow\Services\Export
//use TaskFlow\Core\LoggerFactory;

$db = Database::getInstance()->getConnection();
//$logger = LoggerFactory::create('file');

//$logger->log('TaskFlow API started.');
ob_start();
var_dump($db);
$out = ob_get_contents();
ob_end_clean();
echo "<pre>".print_r($out,true)."</pre>";
echo "TaskFlow API is running!";

try {

    $sql = "SELECT * FROM users";
    $stmt = $db->query($sql);

// Alle Datensätze durchlaufen und ausgeben
    foreach ($stmt as $row) {
        echo $row['id'] . ": " . $row['name'] . "<br>";
    }
}catch (PDOException $e) {
    echo $e->getMessage();
}

//$config = json_decode(file_get_contents(__DIR__ . '/../config/conf.json'),true);
$config = Configloader::getConfInstance();

$confArray = $config->getData();

##############
### Export ###
##############





