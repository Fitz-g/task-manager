<?php
namespace Osmose\Account\Application\UseCase\CreateUser;


final readonly class CreateUserCommand {
    public function __construct(
        public readonly string $userId,
        public readonly string $fullName,
        public readonly string $email
    ) {}
}
