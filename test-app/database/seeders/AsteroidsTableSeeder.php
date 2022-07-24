<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;


class AsteroidsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.nasa.gov/neo/rest/v1/feed', 
        ['query' => ['start_date' => '2022-07-21', 'end_data' => '2022-07-24', 'api_key' => 'zabfRKpVN6zoNMNL6nXDJlRRi8Dp2HOkToPh1BGR']]);
        $resultOfResponse = json_decode($response->getBody())->{"near_earth_objects"};
        foreach($resultOfResponse as $asteroids){
            foreach($asteroids as $asteroid){
                DB::table('asteroids')->insert([
                'id' =>$asteroid->{'id'},
                'referenced' => $asteroid->{'neo_reference_id'},
                    'name' => $asteroid->{'name'},
                    'speed' => $asteroid->{'close_approach_data'}[0]->{'relative_velocity'}->{'kilometers_per_hour'},
                    'ishazardous' => $asteroid->{'is_potentially_hazardous_asteroid'},
                    'Date' => $asteroid->{'close_approach_data'}[0]->{'close_approach_date'}
                ]);   
            }
        }

}
}
