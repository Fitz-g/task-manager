<?php
namespace App\Domain\accounts\Exceptions;

use App\Domain\exceptions\DomainException;

class UserException extends DomainException {
    public function __construct(string $message = "L'email de l'utilisateur est requis.", int $code = 400) {
        parent::__construct($message, $code);
    }
}
