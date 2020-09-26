<?php

use App\Models\checkDuplicate;
use PHPUnit\Framework\TestCase;

class checkDuplicateTest extends TestCase
{
    private $checkDuplicate;

    protected function setUp(): void
    {
        $this->checkDuplicate = new checkDuplicate();
    }

    public function testCheckDuplicateFunction() //will return true if duplicate has been found
    {
        $this->assertTrue($this->checkDuplicate->duplicateExists("user", "email", "bob@builder.com", "connection String"),);
    }
}