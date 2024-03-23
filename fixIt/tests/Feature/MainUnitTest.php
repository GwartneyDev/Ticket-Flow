<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainUnitTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // $response = $this->get('/api/list')
        // ->assertSee('updated');

        // $response->assertStatus(200);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/api/list')->assertSee('updated');
        });

    }
}
