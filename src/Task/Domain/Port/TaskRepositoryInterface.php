<?php
namespace Osmose\Task\Domain\Port;

use Osmose\Task\Domain\Model\Task;

interface TaskRepositoryInterface
{
    public function findById(string $taskId): Task;
    public function save(Task $task): void;
}

