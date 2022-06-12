<?php
namespace Exception;

class FailedToLoginException extends \PDOException
{
    protected $message = 'Failed to login';
}