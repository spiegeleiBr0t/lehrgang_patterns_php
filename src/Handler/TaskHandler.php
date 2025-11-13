<?php

namespace Taskflow\Handler;

use Taskflow\Command\CommandInvoker;
use Taskflow\Command\CreateTaskCommand;
use Taskflow\Command\DeleteTaskCommand;
use Taskflow\Core\LoggerFactory;
use Taskflow\Observer\EventManager;
use Taskflow\Core\Database;


class TaskHandler implements Handler
{

    public function __construct(private EventManager $eventManager, private CommandInvoker $invoker)
    {
    }

    public function handle(array $request): array
    {
        $action = $request['action'] ?? 'list';
        $data = $request['data'] ?? [];

        return match ($action) {
            'create' => $this->createTask($data),
            'list' => $this->listTasks(),
            'delete' => $this->deleteTask($data),
            default => [
                'success' => false,
                'error' => 'Unknown action',
                'status' => 400
            ]
        };
    }

    private function createTask(array $data): array
    {
        // Nutze Command Pattern aus vorherigem Kapitel!
        $command = new CreateTaskCommand(
            $data['title'] ?? '',
            $data['description'] ?? '',
            $this->eventManager
        );

        $this->invoker->addCommand($command);
        $this->invoker->run();

        return [
            'success' => true,
            'message' => 'Task created successfully',
            'status' => 201
        ];
    }


    private function listTasks(): array
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM `tasks` ORDER BY `id` DESC');
        $tasks = $stmt->fetchAll();

        return [
            'success' => true,
            'data' => $tasks,
            'status' => 200,
        ];
    }

    // TODO: Implementiere deleteTask()
    private function deleteTask(array $data): array
    {
        $command = new DeleteTaskCommand($data['id'] ?? 0, $this->eventManager);
        $this->invoker->addCommand($command);
        $this->invoker->run();

        return [
            'success' => true,
            'data' => 'Task delete with id '.$data['id'].' successfully triggered : )',
            'status' => 200,
        ];
    }
}