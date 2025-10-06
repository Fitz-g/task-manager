<?php 

namespace App\Domains\tasks\Models;

use App\Domains\accounts\Models\Comment;
use DateTime;

class Task {
    private string $id;
    private string $createdBy;
    private string $title;
    private string $description;
    private string $createdAt;
    private Comment $comments;

    public function __construct(string $createdBy, string $title, string $description, string $createdAt) {
        $this->id = uniqid();
        $this->title = $title;
        $this->description = $description;
        $this->createdBy = $createdBy;
        $this->createdAt = $createdAt;
    }

    public function getTitle(): string {
        return $this->title;
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
}