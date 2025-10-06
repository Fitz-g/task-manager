<?php
namespace App\Domains\tasks\Exceptions;

use App\Domains\exceptions\DomainException;

class TaskDueDateInPastException extends DomainException {
    public function __construct(string $message = "La date de fin est dans le passé.", int $code = 400) {
        parent::__construct($message, $code);
    }

}