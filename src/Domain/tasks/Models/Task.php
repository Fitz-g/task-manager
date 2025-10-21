<?php 

namespace App\Domain\tasks\Models;

use App\Application\ports\tasks\TaskInterface;
use App\Domain\accounts\Models\Comment;
use DateTime;

class Task implements TaskInterface
{
    private int $id;
    private string $createdBy;
    private string $title;
    private string $description;
    private string $createdAt;
    private string $dueDate;
    private Comment $comments;

    public function __construct(int $id, string $createdBy, string $title, string $description, string $dueDate) {
        $this->id = $id;
        $this->createdAt = (new DateTime('now'))->format('Y-m-d H:i:s');
        $this->dueDate = $dueDate;
        $this->createdBy = $createdBy;
        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDueDate(): string {
        return $this->dueDate;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getComments(): Comment {
        return $this->comments;
    }

    public function getCreatedBy(): string {
        return $this->createdBy;
    }

    public function getId(): string {
        return $this->id;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }
}