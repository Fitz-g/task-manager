<?php
include "vendor/autoload.php";

use App\Domains\accounts\Commands\CreateUserCommand;
use App\Domains\accounts\Repositories\UserRepository;
use App\Domains\accounts\services\UserManager;
use App\Domains\tasks\Commands\CreateTaskCommand;
use App\Domains\tasks\Repositories\TaskRepository;
use App\Domains\tasks\services\TaskManager;


$userRepository = new UserRepository();
$userManager = new UserManager($userRepository);

$userCommand = new CreateUserCommand('Test', 'xG4yO@example.com');
$user = $userManager->createUser($userCommand);

$taskRepository = new TaskRepository();
$taskManager = new TaskManager($taskRepository);

$taskCommand = new CreateTaskCommand($user->getId(), 'Test', 'Test', '2023-01-01 00:00:00');
$taskCommand2 = new CreateTaskCommand($user->getId(), 'Test2', 'Test2', '2023-01-01 00:00:00');
$taskManager->createTask($taskCommand);
$taskManager->createTask($taskCommand2);

dd($taskManager->getTasks(), $userManager->getAllUsers());
