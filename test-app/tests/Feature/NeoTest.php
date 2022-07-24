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

        $asteroids = json_decode($response->getBody()); 
        foreach($asteroids as $asteroid){
            assert($asteroid->{'ishazardous'} == '1');
        }
    }

    public function test_a_fastest_request_without_hazardous_parametr()
    {
        $response = $this->get('/neo/fastest');

        $response
            ->assertStatus(200);
        $asteroids = json_decode($response->getBody()); 
        foreach($asteroids as $asteroid){
            assert($asteroid->{'ishazardous'} == '0');
        }   
    }

    public function test_a_fastest_request_with_hazardous_true()
    {
        $response = $this->get('/neo/fastest?hazardous=true');

        $response
            ->assertStatus(200);
        $asteroids = json_decode($response->getBody()); 
        foreach($asteroids as $asteroid){
            assert($asteroid->{'ishazardous'} == '1');
        }   
    }

    public function test_a_fastest_request_with_hazardous_false()
    {
        $response = $this->get('/neo/fastest?hazardous=false');

        $response
            ->assertStatus(200);
        $asteroids = json_decode($response->getBody()); 
        foreach($asteroids as $asteroid){
            assert($asteroid->{'ishazardous'} == '0');
        }   
    }

    public function test_a_fastest_request_with_wrong_hazardous()
    {
        $response = $this->get('/neo/fastest?hazardous=err');

        $response
            ->assertStatus(200)
            ->assertJson([
                    'code'      =>  400,
                    'message'   =>  'The hazardous parameter must be true or false'
            ]);
    }

}
