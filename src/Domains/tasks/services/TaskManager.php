<?php

namespace App\Domains\tasks\services;

use App\Domains\tasks\Models\Task;


class TaskManager {
    private array $tasks = [];

    public function getTasks() {
        return $this->tasks;
    }

    public function createTask($userId, $title, $description, $createdAt): Task {
        $task = new Task($userId, $title, $description, $createdAt);
        $this->tasks[] = $task;
        return $task;
    }

    public function deleteTask($id) {
        foreach ($this->tasks as $key => $task) {
            if ($task->getId() === $id) {
                unset($this->tasks[$key]);
            }
        }
    }
}