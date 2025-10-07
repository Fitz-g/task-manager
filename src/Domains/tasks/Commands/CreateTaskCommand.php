<?php
namespace App\Domains\tasks\Commands;

use App\Domains\tasks\Exceptions\TaskException;
use DateTime;

class CreateTaskCommand {
    public function __construct(
        private string $createdBy,
        private string $title,
        private string $description,
        private string $dueDate,
    ) {
        $this->validate();
    }

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

    private function validate() {
        if (empty($this->getTitle())) {
            throw new TaskException('Le titre de la tâche est requis');
        }
        if (empty($this->getDescription()) === null) {
            throw new TaskException('La description de la tâche est requise');
        }
        if ($this->getDueDate() < (new DateTime('now'))->format('Y-m-d H:i:s')) {
            throw new TaskException('La date d\'échéance ne peut être dans le passé.');
        }
    }
}