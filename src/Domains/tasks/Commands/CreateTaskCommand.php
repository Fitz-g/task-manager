<?php
namespace App\Domains\tasks\Commands;

class CreateTaskCommand {
    public function __construct(
        private string $createdBy,
        private string $title,
        private string $description,
    ){
        $this->validate();
    }

    public function getUserId(): string {
        return $this->createdBy ?? throw new \InvalidArgumentException('L\'utilisateur est requis');
    }

    public function getTitle(): string {
        return $this->title ?? throw new \InvalidArgumentException('Le titre de la tâche est requis');
    }

    public function getDescription(): string {
        return $this->description ?? throw new \InvalidArgumentException('La description de la tâche est requise');
    }

    private function validate() {
        if (empty($this->title)) {
            throw new \InvalidArgumentException('Le titre de la tâche est requis');
        }
        if (empty($this->description) === null) {
            throw new \InvalidArgumentException('La description de la tâche est requise');
        }
        if (empty($this->createdBy) === null) {
            throw new \InvalidArgumentException('L\'utilisateur est requis');
        }
    }
}