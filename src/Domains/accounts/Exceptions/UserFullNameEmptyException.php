<?php
namespace App\Domains\accounts\Exceptions;

use App\Domains\exceptions\DomainException;

class UserFullNameEmptyException extends DomainException {
    public function __construct(string $message = "L'email de l'utilisateur est requis.", int $code = 400) {
        parent::__construct($message, $code);
    }
}