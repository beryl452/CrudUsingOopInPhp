<?php

namespace Test;

use Configuration\Database;
use Class\User;
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
    public function testCanBeCreateUser():void
    {
        $user = new User(new Database());
        $user->createUser("Test","test@example.test",34,"test");
        $this->assertSame("Test",$user->getnameUser());
        $this->assertSame("test@example.test",$user->getemailUser());
        $this->assertSame(34,$user->getageUser());
    }
}