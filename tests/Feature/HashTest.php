<?php

namespace Tests\Feature;

use Tests\TestCase;

class HashTest extends TestCase
{
    /**
     * Test health route.
     *
     * @test
     */
    public function test_(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
