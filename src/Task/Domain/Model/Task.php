<?php 
namespace Osmose\Task\Domain\Model;

use DateTimeImmutable;
use Osmose\Task\Domain\Exception\InvalidDataTaskCreationException;
use Osmose\Task\Domain\Exception\TaskException;

class Task
{
    private int $id;
    private string $userId;
    private string $title;
    private string $description;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $dueDate;
    private ?array $comments = [];

    public function __construct(
        int $id,
        string $userId,
        string $title,
        string $description,
        DateTimeImmutable $dueDate,
        array $comments
    ) {
        if (
            empty($id) ||
            empty($userId) ||
            empty($title) ||
            empty($description) ||
            empty($dueDate)
        ) {
            throw new InvalidDataTaskCreationException("Données invalides pour la création d'une nouvelle tâche.");
        }
        if ($dueDate < new DateTimeImmutable('now')) {
            throw new TaskException("Vous ne pouvez pas créer une nouvelle tâche avec une échéance dans le passé.");
        }
        $this->id = $id;
        $this->createdAt = new DateTimeImmutable('now');
        $this->dueDate = $dueDate;
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
        $this->comments = $comments;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDueDate(): DateTimeImmutable {
        return $this->dueDate;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getComments(): array {
        return $this->comments;
    }

    public function getUserId(): string {
        return $this->userId;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getCreatedAt(): DateTimeImmutable {
        return $this->createdAt;
    }
}