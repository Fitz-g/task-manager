<?php
namespace App\Domain\accounts\Commands;

use App\Domain\accounts\Exceptions\UserEmailInvalidException;
use App\Domain\accounts\Exceptions\UserException;


class CreateUserCommand {
    public function __construct(
        private string $userId,
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

    public function getUserId(): string {
        return $this->userId;
    }

    private function validate() {
        if (empty($this->getFullName())) {
            throw new UserException('Le nom de l\'utilisateur est requis');
        }
        if (empty($this->getEmail())) {
            throw new UserException('L\'email de l\'utilisateur est requis');
        }
        if (empty($this->getUserId())) {
            throw new UserException('Il manque l\'ID de l\'utilisateur qui crée la tâche.');
        }
        if (filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL) === false) {
            throw new UserException('L\'email de l\'utilisateur n\'est pas valide');
        }
    }
}
