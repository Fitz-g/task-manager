<?php
namespace App\Application\ports\accounts;

interface UserInterface
{
    public function getId(): string;
    public function getFullName(): string;
    public function getEmail(): string;
}
