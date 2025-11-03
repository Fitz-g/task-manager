<?php
namespace Osmose\Account\Application\UseCase\CreateUser;

use Osmose\Domain\Port\UserRepositoryInterface;
use Osmose\Model\User;


class CreateUserHandler
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
    ) {}

    public function handle(CreateUserCommand $command): void
    {
        $user = new User(
            id: $command->userId,
            fullName: $command->fullName,
            email: $command->email
        );
        $this->userRepository->save($user);
    }
}

