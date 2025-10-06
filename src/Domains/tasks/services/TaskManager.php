<?php

namespace App\Domains\tasks\services;

use App\Domains\tasks\Commands\CreateTaskCommand;
use App\Domains\tasks\Exceptions\TaskDescriptionEmptyException;
use App\Domains\tasks\Exceptions\TaskDueDateInPastException;
use App\Domains\tasks\Exceptions\TaskTitleEmptyException;
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
        $this->validateTaskCreationDto($command);
        $task = new Task($command->getUserId(), $command->getTitle(), $command->getDescription(), (new DateTime('tomorrow'))->format('Y-m-d H:i:s'));
        $this->iTaskRepository->save($task);
        return $task;   
    }

    private function validateTaskCreationDto(CreateTaskCommand $command) {
        if (empty($command->getTitle())) {
            throw new TaskTitleEmptyException('Le titre de la tâche est requis');
        }
        if (empty($command->getDescription()) === null) {
            throw new TaskDescriptionEmptyException('La description de la tâche est requise');
        }
        if ($command->getDueDate() < (new DateTime('now'))->format('Y-m-d H:i:s')) {
            throw new TaskDueDateInPastException('La date d\'échéance ne peut être dans le passé.');
        }
    }
}