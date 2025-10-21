<?php

namespace App\Application\services;

use App\Domain\tasks\Commands\CreateTaskCommand;
use App\Domain\tasks\Models\Task;
use App\Infrastructure\TaskRepositoryInterface;

class TaskManager {
    private TaskRepositoryInterface $TaskRepositoryInterface;

    public function __construct(TaskRepositoryInterface $TaskRepositoryInterface) {
        $this->TaskRepositoryInterface = $TaskRepositoryInterface;
    }

    public function getTasks() {
        return $this->TaskRepositoryInterface->getTasks();
    }

    public function createTask(CreateTaskCommand $command): Task {
        try {
            $task = new Task($command->getId(), $command->getUserId(), $command->getTitle(), $command->getDescription(), $command->getDueDate());
            $this->TaskRepositoryInterface->save($task);
            return $task;
        } catch (\Exception $e) {
            throw "Une erreur est survenue : {$e->getMessage()}";
        }
    }
}
