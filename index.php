<?php
include "vendor/autoload.php";

use App\Application\services\TaskManager;
use App\Domain\accounts\Commands\CreateUserCommand;

use App\Domain\accounts\services\UserManager;
use App\Domain\tasks\Commands\CreateTaskCommand;
use App\Infrastructure\ArrayUserRepository;
use App\Infrastructure\TaskRepository;


$userRepository = new ArrayUserRepository();
$userManager = new UserManager($userRepository);

$userCommand = new CreateUserCommand('12', 'Test', 'xG4yO@example.com');
$user = $userManager->createUser($userCommand);

$taskRepository = new TaskRepository();
$taskManager = new TaskManager($taskRepository);

$taskCommand = new CreateTaskCommand(1, $user->getId(), 'Test', 'Test', '2025-11-01 00:00:00');
$taskCommand2 = new CreateTaskCommand(2, $user->getId(), 'Test2', 'Test2', '2025-11-11 00:00:00');

$taskManager->createTask($taskCommand);
$taskManager->createTask($taskCommand2);

dd($taskManager->getTasks(), $userManager->getAllUsers());
