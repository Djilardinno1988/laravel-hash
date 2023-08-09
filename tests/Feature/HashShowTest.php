<?php

namespace Tests\Feature;

use App\Models\Hash;
use Tests\TestCase;

class HashShowTest extends TestCase
{
    /**
     * @test
     */
    public function show_not_found(): void
    {
        // preparation
        $hash = Hash::factory(1)->create();
        // action
        //assertion
        $this->getJson(route('hash.show', ['hash' => 'test_string']))
            ->assertNotFound()
            ->assertJsonFragment(['error' => 'Resource not found']);
    }

    /**
     * @test
     */
    public function show_success(): void
    {
        // preparation
        $hash = Hash::factory(1)->create();
        // action
        //assertion
        $this->getJson(route('hash.show', ['hash' => $hash[0]->hash]))
            ->assertOk()
            ->assertJsonFragment(['data' => ['hash' => $hash[0]->hash]]);
    }

    /**
     * @test
     */
    public function show_with_collisions()
    {
        // preparation
        $hash1 = Hash::factory(1)->create();
        $hash2 = Hash::factory(1)->create(['hash' => $hash1[0]->hash, 'item' => $hash1[0]->item]);
        // action
        //assertion
        $this->getJson(route('hash.show', ['hash' => $hash1[0]->hash]))
            ->assertOk()
            ->assertJsonFragment([
                'data' => ['collisions' => [(object) [
                    'hash' => $hash1[0]->hash,
                ],
                    (object) [
                        'hash' => $hash2[0]->hash,
                    ]],
                ],
            ]);
    }
}
