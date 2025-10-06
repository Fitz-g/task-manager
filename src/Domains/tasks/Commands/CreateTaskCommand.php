<?php
namespace App\Domains\tasks\Commands;

class CreateTaskCommand {
    public function __construct(
        private string $createdBy,
        private string $title,
        private string $description,
        private string $dueDate,
    ) { }

    public function getUserId(): string {
        return $this->createdBy;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getDueDate(): string {
        return $this->dueDate;
    }
}