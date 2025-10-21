<?php
namespace App\Application\ports\tasks;

use App\Domain\accounts\Models\Comment;

interface TaskInterface
{
    public function getTitle(): string;
    public function getDueDate(): string;
    public function getCreatedBy(): string;
    public function getId(): string;
    public function getComments(): Comment;
}
