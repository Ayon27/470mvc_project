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
        $this->assertFalse($this->checkDuplicate->duplicateExists("user", "email", "bob@buailder.com", "connection String"),);
    }
}