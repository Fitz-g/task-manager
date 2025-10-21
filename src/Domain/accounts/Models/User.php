<?php 

namespace App\Domain\accounts\Models;

use App\Application\ports\accounts\UserInterface;

class User implements UserInterface
{
    private string $id;
    private string $fullName;
    private string $email;

    public function __construct(string $id, string $fullName, string $email)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
    }

    public function getFullName(): string {
        return $this->fullName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getId(): string {
        return $this->id;
    }
}
