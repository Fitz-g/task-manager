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
        $task = new Task($command->getTitle(), $command->getDescription(), (new DateTime('now'))->format('Y-m-d H:i:s'));
        $this->iTaskRepository->save($task);
        return $task;
    }
}