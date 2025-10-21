<?php
namespace App\Infrastructure;

use App\Domain\tasks\Models\Task;

class ArrayTaskRepository implements TaskRepositoryInterface {
    private array $tasks = [];

    public function save(Task $task): void {
        $this->tasks[] = $task;
    }

    public function getTasks(): array {
        return $this->tasks;
    }
}