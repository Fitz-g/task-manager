<?php
namespace Osmose\User\Domain\Exception;

use \Exception;

class UserNotFoundException extends \Exception
{
    public function __construct($message, $code = 404)
    {
        parent::__construct($message, $code);
    }
}


