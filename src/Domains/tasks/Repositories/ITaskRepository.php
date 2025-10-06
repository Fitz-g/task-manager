<?php
namespace App\Domains\tasks\Repositories;

use App\Domains\tasks\Models\Task;

interface ITaskRepository
{
    public function save(Task $task);
    public function getTasks();
}