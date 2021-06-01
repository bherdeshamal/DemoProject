<?php

//use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ordersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        DB::table('orderstatus')->insert([
            [
                'order_id' => Str::random(10),
                'current_location' => $faker->streetAddress,
                'last_location' => $faker->streetAddress,
                'order_status' => "approved",
            ],
            [
                'order_id' => Str::random(10),
                'current_location' => $faker->streetAddress,
                'last_location' => $faker->streetAddress,
                'order_status' => "delivered",
            ],
            [
                'order_id' => Str::random(10),
                'current_location' => $faker->streetAddress,
                'last_location' => $faker->streetAddress,
                'order_status' => "in transit",
            ],
            [
                'order_id' => Str::random(10),
                'current_location' => $faker->streetAddress,
                'last_location' => $faker->streetAddress,
                'order_status' => "awaiting approval",
            ],
        ]);
    }
}