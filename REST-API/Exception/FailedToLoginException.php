<?php
namespace Class\Exception;

class FailedToLoginException extends \PDOException
{
    protected $message = 'Failed to login';
}