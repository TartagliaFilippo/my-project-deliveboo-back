<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = Restaurant::all();
        $types = Type::all();

        foreach ($restaurants as $restaurant) {
            $randomTypes = $types->random(2);

            $restaurant->types()->attach($randomTypes->pluck('id'));
        }
    }
}