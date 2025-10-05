<?php

use App\Domains\accounts\Models\User;
use App\Domains\tasks\services\TaskManager;

include "vendor/autoload.php";

$taskManager = new TaskManager();
$user = new User('1', 'test', 'test');
$taskManager->createTask($user->getId(), 'test', 'test', "2025-10-05 22:10:14");

var_dump($taskManager->getTasks());