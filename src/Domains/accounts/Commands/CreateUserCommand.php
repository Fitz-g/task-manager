<?php
namespace App\Domains\accounts\Commands;

class CreateUserCommand {
    public function __construct(
        private string $fullName,
        private string $email
    ) {}

    public function getFullName(): string {
        return $this->fullName ?? throw new \InvalidArgumentException('Le nom est requis');
    }

    public function getEmail(): string {
        if ($this->email === null) {
            throw new \InvalidArgumentException('L\'email est requis');
        }
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException('L\'email est invalide');
        }
        return $this->email;
    }
}