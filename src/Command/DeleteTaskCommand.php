<?php

namespace Taskflow\Command;

use Taskflow\Command\Command;
use Taskflow\Core\Database;
use Taskflow\Observer\EventManager;

class DeleteTaskCommand implements Command
{
    public function __construct(private int $taskDbId, private ?EventManager $eventManager = null)
    {
    }

    public function execute(): void
    {
        $db = Database::getInstance();
        $stmnt = $db->getConnection()->prepare('DELETE FROM tasks WHERE id = ?');
        $stmnt->execute([$this->taskDbId]);
    }
}