<?php
namespace Osmose\Account\Domain\Exception;

class InvalidDataForCreateUser extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}


