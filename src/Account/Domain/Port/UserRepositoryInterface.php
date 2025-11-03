<?php
namespace Osmose\Domain\Port;

use Osmose\Model\User;

interface UserRepositoryInterface
{
    public function findById(string $id): User;
    public function save(User $user): void;
}
