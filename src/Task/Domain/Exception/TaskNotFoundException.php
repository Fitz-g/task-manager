<?php
namespace Osmose\Task\Domain\Exception;

use \Exception;

class TaskNotFoundException extends \Exception
{
    public function __construct($message, $code = 404)
    {
        parent::__construct($message, $code);
    }
}


