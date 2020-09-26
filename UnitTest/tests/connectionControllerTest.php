<?php

use App\Models\connectionController;
use PHPUnit\Framework\TestCase;

class connectionControllerTest extends TestCase
{
    private $connectionController;

    protected function setUp(): void
    {
        $this->connectionController = new connectionController('root', 'localhost', '', '391project');
    }

    public function testInitiateConnection()
    {
        $this->assertTrue($this->connectionController->initiateConnection());
        $this->connectionController->closeConnection();
    }
}