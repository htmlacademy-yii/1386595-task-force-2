<?php
namespace app\exception;

use Exception;

class StatusException extends Exception
{}

class RoleException extends Exception
{}

set_exception_handler('StatusException');
set_exception_handler('RoleException');
