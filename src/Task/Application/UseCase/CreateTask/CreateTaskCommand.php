<?php
namespace Osmose\Task\Application\UseCase\CreateTask;

use DateTimeImmutable;


final readonly class CreateTaskCommand
{
    public function __construct(
        public readonly string $id,
        public readonly string $userId,
        public readonly string $title,
        public readonly string $description,
        public readonly DateTimeImmutable $dueDate,
        public readonly ?array $comments
    ) {}
}
