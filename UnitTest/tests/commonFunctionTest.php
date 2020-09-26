<?php

use App\Models\checkUserInfo;
use PHPUnit\Framework\TestCase;

class commonFunctionTest extends TestCase
{
    private $checkUserInfo;

    protected function setUp(): void
    {
        $this->checkUserInfo = new checkUserInfo();
    }

    public function testCheckNumber() //will return true if number is valid(numerical only)
    {
        $this->assertTrue($this->checkUserInfo->checkNumber(1442),);
    }

    public function testCheckName() //will return true if name is valid(alphabets only)
    {
        $this->assertTrue($this->checkUserInfo->checkName("Bob the Impostor"),);
    }

}