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
        try {
            $user = new User($command->getFullName(), $command->getEmail());
            $this->userRepository->save($user);
            return $user;
        } catch (\Exception $e) {
            throw "Une erreur est survenue lors de la créaction de l'utilisateur : {$e->getMessage()}";
        }
    }

    public function getAllUsers() {
        return $this->userRepository->getAllUsers();
    }
}