<?php
namespace Osmose\Account\Infrastructure\Persistence\InMemory;


use Osmose\Domain\Port\UserRepositoryInterface;
use Osmose\Model\User;
use Osmose\User\Domain\Exception\UserNotFoundException;

class ArrayUserRepository implements UserRepositoryInterface {
    private array $users = [];

    public function save(User $user): void
    {
        $this->users[$user->getId()] = $user;
    }

    public function findById(string $userId): User
    {
        if(empty($this->users[$userId])) {
            throw new UserNotFoundException("Tâche avec ID {$userId} non trouvée.");
        }
        return $this->users[$userId];
    }
}