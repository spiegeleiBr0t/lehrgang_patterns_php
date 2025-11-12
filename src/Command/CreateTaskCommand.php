<?php

namespace Taskflow\Command;

use Taskflow\Command\Command;
use Taskflow\Core\Database;
use Taskflow\Observer\EventManager;
use Taskflow\Observer\EventType;

class CreateTaskCommand implements Command
{
    public function __construct(
        private string $name,
        private string $description = '',
        private ?EventManager $eventManager = null
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function execute(): void
    {
        try {
            $db = Database::getInstance();
            $stmt = $db->getConnection()->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
            $stmt->execute([$this->name, $this->description]);

            if (!empty($this->eventManager)) {
                $this->eventManager->notify(
                    EventType::taskcreated,
                    ['task_title' => $this->name]
                );
            }
        } catch (\PDOException $e) {
            throw new \Exception( $e->getMessage());
        }
    }
}