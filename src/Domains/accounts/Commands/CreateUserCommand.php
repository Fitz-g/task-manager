<?php
namespace App\Domains\accounts\Commands;

use App\Domains\accounts\Exceptions\UserEmailInvalidException;
use App\Domains\accounts\Exceptions\UserException;


class CreateUserCommand {
    public function __construct(
        private string $fullName,
        private string $email
    ) {
        $this->validate();
    }

    public function getFullName(): string {
        return $this->fullName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    private function validate() {
        if (empty($this->getFullName())) {
            throw new UserException('Le nom de l\'utilisateur est requis');
        }
        if (empty($this->getEmail())) {
            throw new UserException('L\'email de l\'utilisateur est requis');
        }
        if (filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL) === false) {
            throw new UserException('L\'email de l\'utilisateur n\'est pas valide');
        }
    }
}