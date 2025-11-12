<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Taskflow\Command\CommandInvoker;
use Taskflow\Command\CreateTaskCommand;
use Taskflow\Command\DeleteTaskCommand;
use Taskflow\Core\Database;
use Taskflow\Core\Configloader;
use Taskflow\Observer\EventManager;
use Taskflow\Observer\EventType;
use Taskflow\Observer\LogObserver;
use Taskflow\Observer\NotificationObserver;
use Taskflow\Services\Export;
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

//try {
//
//    $sql = "SELECT * FROM users";
//    $stmt = $db->query($sql);
//
//// Alle Datensätze durchlaufen und ausgeben
//    foreach ($stmt as $row) {
//        echo $row['id'] . ": " . $row['name'] . "<br>";
//    }
//}catch (PDOException $e) {
//    echo $e->getMessage();
//}

//$config = json_decode(file_get_contents(__DIR__ . '/../config/conf.json'),true);
$config = Configloader::getConfInstance();

$confArray = $config->getData();

##############
### Export ###
##############

##############
##Export End##
##############

echo "<pre>\n
##############\n
### Export ###\n
##############\n

</pre>";

$eventManager = EventManager::getInstance();
$eventManager->attach(new LogObserver());
$eventManager->attach(new NotificationObserver());
$eventManager->notify(EventType::notification, ['id' => 17, 'title' => 'Testaufgabe']);

# Command Testen
echo "command Testen ".PHP_EOL;

$invoker = new CommandInvoker();

$createTaskCommands = new CreateTaskCommand(
                        'sleep',
                        'you feel sleepy o.O sleep is important, go to bed and sleep NOW!',
                        $eventManager
                    );

$deleteTaskCommand = new DeleteTaskCommand(1);
$invoker->addCommand($createTaskCommands);
$invoker->addCommand($deleteTaskCommand);
$invoker->run();











































