<?php 
namespace App\Domains\accounts\services;

use App\Domains\accounts\Models\User;

class UserManager {
    public function createUser($id, $fullName, $email) {
        return new User($id, $fullName, $email);
    }
}