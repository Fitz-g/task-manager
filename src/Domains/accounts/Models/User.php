<?php 

namespace App\Domains\accounts\Models;

use App\Domains\tasks\Models\Task;
use App\Domains\tasks\services\TaskManager;

class User
{
    private string $id;
    private string $fullName;
    private string $email;

    public function __construct(string $fullName, string $email)
    {
        $this->id = uniqid();
        $this->fullName = $fullName;
        $this->email = $email;
    }

    public function getFullName(): string {
        return $this->fullName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setFullName(string $fullName): void {
        $this->fullName = $fullName;
    }

    public function setEmail(string $email): void {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException('Invalid email');
        }
        $this->email = $email;
    }

    public function getId(): string {
        return $this->id;
    }
}