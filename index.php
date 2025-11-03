<?php

use Osmose\Account\Application\UseCase\CreateUser\CreateUserCommand;
use Osmose\Account\Application\UseCase\CreateUser\CreateUserHandler;
use Osmose\Account\Infrastructure\Persistence\InMemory\ArrayUserRepository;
use Osmose\Task\Application\UseCase\CreateTask\CreateTaskCommand;
use Osmose\Task\Application\UseCase\CreateTask\CreateTaskHandler;
use Osmose\Task\Infrastructure\Persistence\InMemory\ArrayTaskRepository;

include "vendor/autoload.php";


$userRepository = new ArrayUserRepository();
$createUserHandler = new CreateUserHandler($userRepository);

$userCommand = new CreateUserCommand('user-1', 'Test', 'xG4yO@example.com');
$createUserHandler->handle($userCommand);

$taskRepository = new ArrayTaskRepository();
$createTaskHandler = new CreateTaskHandler($taskRepository);


$taskCommand = new CreateTaskCommand(
    id: 'task-1',
    userId: 'user-1',
    title: 'task-1',
    description: 'description-1',
    dueDate: new DateTimeImmutable("+2 days"),
    comments: ['Commentaire-1', 'Commentaire-2']
);
$taskCommand2 = new CreateTaskCommand(
    id: 'task-2',
    userId: 'user-2',
    title: 'task-2',
    description: 'description-2',
    dueDate: new DateTimeImmutable("+2 week"),
    comments: []
);

$createTaskHandler->handle($taskCommand);
$createTaskHandler->handle($taskCommand2);


dd('Ok');
