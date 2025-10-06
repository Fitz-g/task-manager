<?php
namespace App\Domains\tasks\Repositories;

use App\Domains\tasks\Models\Task;

class TaskRepository implements ITaskRepository {
    private array $tasks = [];

    public function save(Task $task): void {
        $this->tasks[] = $task;
    }

    public function getTasks(): array {
        return $this->tasks;
    }
}