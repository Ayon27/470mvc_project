<?php

use App\Models\loginController;
use PHPUnit\Framework\TestCase;

class loginControllerTest extends TestCase
{
    private $loginController;

    protected function setUp(): void
    {
        $this->loginController = new loginController();
    }

    public function testGetName() //will return true if name has been received
    {
        $this->loginController->setName('Bob the Builder');

        $this->assertEquals($this->loginController->getName(), 'Bob the Builder');
    }

    public function testcheckEmail() //will return true if email is valid
    {
        $this->loginController->setEmail('bob@builder.com');
        $this->assertEquals($this->loginController->getEmail(), 'bob@builder.com');
        $this->assertTrue($this->loginController->checkEmail(),);
    }

    public function testcheckEmailforInvalidValues() //will return false if email is invalid
    {
        $this->loginController->setEmail('45*/-++@a24^%.com');
        $this->assertEquals($this->loginController->getEmail(), '45*/-++@a24^%.com');
        $this->assertTrue($this->loginController->checkEmail(),);
    }
}
