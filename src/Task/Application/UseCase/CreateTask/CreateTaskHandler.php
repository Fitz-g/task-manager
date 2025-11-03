<?php
namespace Osmose\Task\Application\UseCase\CreateTask;

use Osmose\Task\Domain\Model\Task;
use Osmose\Task\Domain\Port\TaskRepositoryInterface;

class CreateTaskHandler
{
    public function __construct(
        private readonly TaskRepositoryInterface $taskRepository,
    ) {}
    
    public function handle(CreateTaskCommand $command): void
    {
        $task = new Task(
            id: $command->id,
            userId: $command->userId,
            title: $command->title,
            description: $command->description,
            dueDate: $command->dueDate,
            comments: $command->comments
        );

        $this->taskRepository->save($task);
    }
}

