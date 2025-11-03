<?php
namespace Osmose\Account\Domain\Exception;

use \Exception;

class InvalidUserEmailException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}


