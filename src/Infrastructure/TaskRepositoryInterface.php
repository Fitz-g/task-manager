<?php
namespace App\Infrastructure;

use App\Domain\tasks\Models\Task;

interface TaskRepositoryInterface
{
    public function save(Task $task);
    public function getTasks();
}