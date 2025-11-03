<?php 

namespace Osmose\Model;

use Osmose\Account\Domain\Exception\InvalidDataForCreateUser;
use Osmose\Account\Domain\Exception\InvalidUserEmailException;

class User
{
    private string $id;
    private string $fullName;
    private string $email;

    public function __construct(string $id, string $fullName, string $email)
    {
        if(!$id || !$fullName || !$email) {
            throw new InvalidDataForCreateUser("Données invalide pour la création d'un nouvel utilisateur.");
        }
        if (filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidUserEmailException('L\'email de l\'utilisateur n\'est pas valide');
        }
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
    }

    public function getFullName(): string {
        return $this->fullName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getId(): string {
        return $this->id;
    }
}
