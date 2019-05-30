<?php

namespace AppTest;

use App\Response;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
    private $response;

    public function testSend(): void
    {
        $response = $this->response->send();
        $this->assertContains('test2', $response['body']);
    }

    protected function setUp(): void
    {
        $objects = [
            ['Key' => 'photos/test1.jpg'],
            ['Key' => 'photos/test2.jpg'],
        ];
        $this->response = new Response($objects);
    }
}
