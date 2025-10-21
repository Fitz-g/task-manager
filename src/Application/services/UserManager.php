<?php 
namespace App\Domain\accounts\services;

use App\Domain\accounts\Commands\CreateUserCommand;
use App\Domain\accounts\Models\User;
use App\Infrastructure\UserRepositoryInterface;

class UserManager {
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function createUser(CreateUserCommand $command) {
        try {
            $user = new User($command->getUserId(), $command->getFullName(), $command->getEmail());
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
