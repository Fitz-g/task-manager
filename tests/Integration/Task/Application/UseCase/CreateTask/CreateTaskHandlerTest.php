<?php
namespace Test\Integration\Task\Application\UseCase\CreateTask;

use DateTimeImmutable;
use Osmose\Task\Application\UseCase\CreateTask\CreateTaskCommand;
use Osmose\Task\Application\UseCase\CreateTask\CreateTaskHandler;
use Osmose\Task\Infrastructure\Persistence\InMemory\ArrayTaskRepository;
use PHPUnit\Framework\TestCase;

class CreateTaskHandlerTest extends TestCase
{
    public function test_create_task_successful(): void
    {
        $taskRepository = new ArrayTaskRepository();
        $taskCommand = new CreateTaskCommand(
            id: 'task-1',
            userId: 'user-1',
            title: 'task-1',
            description: 'description-1',
            dueDate: new DateTimeImmutable("+2 days"),
            comments: ['Commentaire-1', 'Commentaire-2']
        );
        $createTaskHandler = new CreateTaskHandler($taskRepository);
        $createTaskHandler->handle($taskCommand);

        $task = $taskRepository->findById('task-1');

        $this->assertEquals('task-1', $task->getId());
    }
}

