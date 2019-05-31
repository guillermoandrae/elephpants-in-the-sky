<?php

namespace AppTest;

use Aws\Sdk;
use App\Elephpants;
use PHPUnit\Framework\TestCase;

final class ElephpantsTest extends TestCase
{
    private $elephpants;

    public function testFindAll(): void
    {
        $items = $this->elephpants->findAll();
        $this->assertArrayHasKey('Key', $items[0]);
        $this->assertStringContainsString('x', $items[0]['Key']);
    }

    protected function setUp(): void
    {
        $sdk = new Sdk([
            'region' => 'us-east-1',
            'version' => 'latest',
        ]);
        $this->elephpants = new Elephpants($sdk);
    }
}
