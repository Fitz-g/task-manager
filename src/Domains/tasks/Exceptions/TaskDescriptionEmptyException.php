<?php
namespace App\Domains\tasks\Exceptions;

use App\Domains\exceptions\DomainException;

class TaskDescriptionEmptyException extends DomainException {
    public function __construct(string $message = "La tâche n'a pas de description.", int $code = 400) {
        parent::__construct($message, $code);
    }
}
