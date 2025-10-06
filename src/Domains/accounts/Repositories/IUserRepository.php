<?php
namespace App\Domains\accounts\Repositories;

use App\Domains\accounts\Models\User;

interface IUserRepository {
    public function save(User $user);
    public function getAllUsers();
    // public function delete(User $user);
    // public function edit(User $user);
    // public function findById($id);
}