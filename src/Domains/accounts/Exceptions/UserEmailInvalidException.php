<?php
namespace App\Domains\accounts\Exceptions;

use App\Domains\exceptions\DomainException;

class UserEmailInvalidException extends DomainException
{
    public function __construct(string $message = "L'email de l'utilisateur n'est pas valide.", int $code = 400) {
        parent::__construct($message, $code);
    }
}
