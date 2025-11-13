<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Taskflow\Handler\TaskHandler;
use Taskflow\Handler\Decorator\LoggingDecorator;
use Taskflow\Handler\Decorator\TimingDecorator;
use Taskflow\Handler\Decorator\ErrorHandlingDecorator;
use Taskflow\Core\LoggerFactory;
use Taskflow\Observer\EventManager;
use Taskflow\Observer\LogObserver;
use Taskflow\Observer\NotificationObserver;
use Taskflow\Command\CommandInvoker;


// ZENTRALE DEPENDENCIES erstellen (nur EINMAL!)
$logger = LoggerFactory::create('file');
$eventManager =  EventManager::getInstance();
$eventManager->attach(new LogObserver($logger));
$invoker = new CommandInvoker();

// Basis-Handler erstellen
$handler = new TaskHandler($eventManager, $invoker);

// Decorator-Stack aufbauen (von innen nach außen!) -> Nach und nach einkommentieren
 $handler = new LoggingDecorator($handler, $logger);
 $handler = new TimingDecorator($handler, $logger);
 $handler = new ErrorHandlingDecorator($handler);

// Request bauen
$request = [
    'action' => $_GET['action'] ?? 'list',
    'data' => json_decode(file_get_contents('php://input'), true) ?? $_POST,
    'method' => $_SERVER['REQUEST_METHOD']
];

// Request durch den Decorator-Stack schicken
$response = $handler->handle($request);

// JSON Response ausgeben
header('Content-Type: application/json');
http_response_code($response['status'] ?? 200);
echo json_encode($response, JSON_PRETTY_PRINT);










































