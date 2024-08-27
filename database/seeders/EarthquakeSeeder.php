<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EarthquakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $client = new Client([
            'base_uri' => 'https://everyearthquake.p.rapidapi.com/',
            'headers' => [
                'X-RapidAPI-Key' => 'f45ae376b9msh7e89eb9405de726p19e82ajsn0907d7b3af1e',
                'X-RapidAPI-Host' => 'everyearthquake.p.rapidapi.com'
            ]
        ]);

        $response = $client->request('GET', 'earthquakes');
        $data = $response->getBody()->getContents();
        $earthquakes = json_decode($data)->data;

        foreach ($earthquakes as $earthquake) {
            $city_exists = DB::table('city')->select('id')->where('name', $earthquake->city)->first();
            if (!$city_exists) {
                DB::table('city')->insert([
                    'name' => $earthquake->city,
                ]);
            }
            $city_id = DB::table('city')->select('id')->where('name', $earthquake->city)->first()->id;

            $location_exists = DB::table('location')->select('id')->where('location', $earthquake->location)->first();
            if (!$location_exists) {
                DB::table('location')->insert([
                    'location' => $earthquake->location,
                ]);
            }
            $location_id = DB::table('location')->select('id')->where('location', $earthquake->location)->first()->id;

            $continent_exists = DB::table('continents')->select('id')->where('name', $earthquake->continent)->first();
            if (!$continent_exists) {
                DB::table('continents')->insert([
                    'name' => $earthquake->continent,
                ]);
            }
            $continent_id = DB::table('continents')->select('id')->where('name', $earthquake->continent)->first()->id;

            $country_exists = DB::table('country')->select('id')->where('name', $earthquake->country)->first();
            if (!$country_exists) {
                DB::table('country')->insert([
                    'name' => $earthquake->country,
                ]);
            }
            $country_id = DB::table('country')->select('id')->where('name', $earthquake->country)->first()->id;

            DB::table('earthquakes')->insert([
                'magnitude' => $earthquake->magnitude,
                'title' => $earthquake->title,
                'date' => $earthquake->date,
                'city_id' => $city_id,
                'continent_id' => $continent_id,
                'location_id' => $location_id,
                'country_id' => $country_id,
            ]);
        }
    }
}
