<?php
namespace App\Domain\tasks\Commands;

use App\Domain\tasks\Exceptions\TaskException;
use DateTime;

class CreateTaskCommand {
    public function __construct(
        private int $id,
        private string $createdBy,
        private string $title,
        private string $description,
        private string $dueDate,
    ) {
        $this->validate();
    }

    public function getId(): int {
        return $this->id;
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

    public function getCreatedBy(): string {
        return $this->dueDate;
    }

    private function validate() {
        if (empty($this->getId())) {
            throw new TaskException("ID de la tâche manquant");
        }
        if (empty($this->getTitle())) {
            throw new TaskException('Le titre de la tâche est requis');
        }
        if (empty($this->getDescription()) === null) {
            throw new TaskException('La description de la tâche est requise');
        }
        if ($this->getDueDate() < (new DateTime('now'))->format('Y-m-d H:i:s')) {
            throw new TaskException('La date d\'échéance ne peut être dans le passé.');
        }
        if (empty($this->getCreatedBy())) {
            throw new TaskException("Il manque l'ID du créateur de la tâche.");
        }
    }
}
