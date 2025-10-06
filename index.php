<?php
include "vendor/autoload.php";

use App\Domains\accounts\services\UserManager;
use App\Domains\tasks\services\TaskManager;


$taskManager = new TaskManager();
$userManager = new UserManager();
$user = $userManager->createUser('1', 'test', 'test');
$taskManager->createTask($user->getId(), 'test', 'test', "2025-10-05 22:10:14");

dd($taskManager->getTasks());
