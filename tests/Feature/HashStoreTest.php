<?php

namespace Tests\Feature;

use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;

class HashStoreTest extends TestCase
{
    private Generator $faker;

    public function setUp(): void
    {
        $this->faker = Factory::create();
        parent::setUp();
    }

    /**
     * A basic feature test example.
     *
     * @test
     */
    public function store_success(): void
    {
        // preparation
        $item = $this->faker->name;
        // action
        //assertion
        $this->post(route('hash.store', ['item' => $item]))
            ->assertCreated()
            ->assertJsonFragment(['data' => ['hash' => sha1($item)]]);
    }

    /**
     * @test
     */
    public function store_validation_required(): void
    {
        // preparation
        $item = str_repeat('test', 100);
        // action
        //assertion
        $this->post(route('hash.store', ['item' => $item]))
            ->assertFound()
            ->assertDontSee(sha1($item));
    }
}
