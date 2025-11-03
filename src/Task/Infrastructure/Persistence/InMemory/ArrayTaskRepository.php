<?php
namespace Osmose\Task\Infrastructure\Persistence\InMemory;

use Osmose\Task\Domain\Exception\TaskNotFoundException;
use Osmose\Task\Domain\Model\Task;
use Osmose\Task\Domain\Port\TaskRepositoryInterface;

class ArrayTaskRepository implements TaskRepositoryInterface {
    private array $tasks = [];

    public function save(Task $task): void
    {
        $this->tasks[$task->getId()] = $task;
    }

    public function findById(string $taskId): Task
    {
        if(empty($this->tasks[$taskId])) {
            throw new TaskNotFoundException("Tâche avec ID {$taskId} non trouvée.");
        }
        return $this->tasks[$taskId];
    }
}

