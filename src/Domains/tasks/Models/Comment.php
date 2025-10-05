<?php 

namespace App\Domains\accounts\Models;

class Comment {
    public string $id;
    public string $task_id;
    public string $user_id;
    public string $comment;

    public function __construct(string $id, string $task_id, string $user_id, string $comment) {
        $this->id = $id;
        $this->task_id = $task_id;
        $this->user_id = $user_id;
        $this->comment = $comment;
    }

    public function getComment(): string {
        return $this->comment;
    }
}