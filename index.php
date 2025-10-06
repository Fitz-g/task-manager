<?php
include "vendor/autoload.php";

use App\Domains\accounts\Models\User;
use App\Domains\tasks\services\TaskManager;


$taskManager = new TaskManager();
$user = new User('1', 'test', 'test');
$taskManager->createTask($user->getId(), 'test', 'test', "2025-10-05 22:10:14");

dd($taskManager->getTasks());
