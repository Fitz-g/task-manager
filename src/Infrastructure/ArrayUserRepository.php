<?php
namespace App\Infrastructure;

use App\Application\ports\accounts\UserInterface;

class ArrayUserRepository implements UserRepositoryInterface {
    private array $users = [];
    public function save(UserInterface $user) {
        $this->users[] = $user;
    }

    public function getAllUsers(): array {
        return $this->users;
    }
}