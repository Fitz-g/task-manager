<?php
namespace App\Domains\tasks\Exceptions;

use App\Domains\exceptions\DomainException;

class TaskTitleEmptyException extends DomainException {
    public function __construct(string $message = "La tâche n'a pas de titre.", int $code = 400) {
        parent::__construct($message, $code);
    }
}