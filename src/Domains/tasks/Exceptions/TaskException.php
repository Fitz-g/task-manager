<?php
namespace App\Domains\tasks\Exceptions;

use App\Domains\exceptions\DomainException;

class TaskException extends DomainException {
    public function __construct(string $message = "Une erreur est survenue dans la création de la tâche.", int $code = 400) {
        parent::__construct($message, $code);
    }
}
