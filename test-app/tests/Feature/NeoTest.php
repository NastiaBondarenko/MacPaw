<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NeoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_a_basic_request()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(200)
            ->assertJson([
                "hello"=>"MacPaw Internship 2022!",
            ]);

    }

    public function test_a_hazardous_request()
    {
        $response = $this->get('/neo/hazardous');

        $response
            ->assertStatus(200);
        
    }

    public function test_a_fastest_request()
    {
        $response = $this->get('/neo/fastest');

        $response
            ->assertStatus(200);
        
    }

}
