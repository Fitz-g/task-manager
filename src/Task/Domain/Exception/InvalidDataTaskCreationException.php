<?php
namespace Osmose\Task\Domain\Exception;


class InvalidDataTaskCreationException extends \Exception {
    public function __construct(string $message = "Une erreur est survenue dans la création de la tâche.", int $code = 400) {
        parent::__construct($message, $code);
    }
}
