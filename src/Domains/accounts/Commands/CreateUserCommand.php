<?php
namespace App\Domains\accounts\Commands;

class CreateUserCommand {
    public function __construct(
        private string $fullName,
        private string $email
    ) { }

    public function getFullName(): string {
        return $this->fullName;
    }

    public function getEmail(): string {
        return $this->email;
    }
}