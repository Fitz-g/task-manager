<?php 
namespace App\Domains\accounts\services;

use App\Domains\accounts\Commands\CreateUserCommand;
use App\Domains\accounts\Exceptions\UserEmailEmptyException;
use App\Domains\accounts\Exceptions\UserEmailInvalidException;
use App\Domains\accounts\Exceptions\UserFullNameEmptyException;
use App\Domains\accounts\Models\User;
use App\Domains\accounts\Repositories\UserRepository;

class UserManager {
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    public function createUser(CreateUserCommand $command) {
        $this->validateUserCreationDto($command);
        $user = new User($command->getFullName(), $command->getEmail());
        $this->userRepository->save($user);
        echo "Utilisateur créé : " . $user->getFullName() . "\n";
        return $user;
    }

    public function getAllUsers() {
        return $this->userRepository->getAllUsers();
    }

    private function validateUserCreationDto(CreateUserCommand $command) {
        if (empty($command->getFullName())) {
            throw new UserFullNameEmptyException('Le nom de l\'utilisateur est requis');
        }
        if (empty($command->getEmail())) {
            throw new UserEmailEmptyException('L\'email de l\'utilisateur est requis');
        }
        if (filter_var($command->getEmail(), FILTER_VALIDATE_EMAIL) === false) {
            throw new UserEmailInvalidException('L\'email de l\'utilisateur n\'est pas valide');
        }
    }
}