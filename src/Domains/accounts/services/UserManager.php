<?php 
namespace App\Domains\accounts\services;

use App\Domains\accounts\Commands\CreateUserCommand;
use App\Domains\accounts\Models\User;
use App\Domains\accounts\Repositories\UserRepository;

class UserManager {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function createUser(CreateUserCommand $command) {
        $user = new User($command->getFullName(), $command->getEmail());
        $this->userRepository->save($user);
        echo "Utilisateur créé : " . $user->getFullName() . "\n";
        return $user;
    }

    public function getAllUsers() {
        return $this->userRepository->getAllUsers();
    }
}