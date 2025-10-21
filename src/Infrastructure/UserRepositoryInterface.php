<?php
namespace App\Infrastructure;

use App\Application\ports\accounts\UserInterface;


interface UserRepositoryInterface {
    public function save(UserInterface $user);
    public function getAllUsers();
    // public function delete(User $user);
    // public function edit(User $user);
    // public function findById($id);
}