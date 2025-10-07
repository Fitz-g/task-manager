<?php

namespace App\Domains\tasks\services;

use App\Domains\tasks\Commands\CreateTaskCommand;
use App\Domains\tasks\Models\Task;
use App\Domains\tasks\Repositories\ITaskRepository;
use DateTime;

class TaskManager {
    private ITaskRepository $iTaskRepository;

    public function __construct(ITaskRepository $iTaskRepository) {
        $this->iTaskRepository = $iTaskRepository;
    }

    public function getTasks() {
        return $this->iTaskRepository->getTasks();
    }

    public function createTask(CreateTaskCommand $command): Task {
        try {
            $task = new Task($command->getUserId(), $command->getTitle(), $command->getDescription(), $command->getDueDate());
            $this->iTaskRepository->save($task);
            return $task;
        } catch (\Exception $e) {
            throw "Une erreur est survenue : {$e->getMessage()}";
        }
    }
}