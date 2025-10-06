<?php
namespace App\Domains\accounts\Repositories;

use App\Domains\accounts\Models\User;

class UserRepository implements IUserRepository {
    private array $users = [];
    public function save(User $user) {
        $this->users[] = $user;
    }

    public function getAllUsers(): array {
        return $this->users;
    }
}