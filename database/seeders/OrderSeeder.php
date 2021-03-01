<?php

namespace Database\Seeders;

use App\Models\Orders;
use Faker\Factory;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0; $i < 20; $i++)
        {
            Orders::addNewOrder($faker->name, $faker->address, rand(1,10), 15);
        }
    }
}
