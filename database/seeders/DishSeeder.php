<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_dishes = config('dishes');

        foreach ($_dishes as $_dish) {
            $plate = new Dish();
            $plate->restaurant_id = $_dish['restaurant_id'];
            $plate->name = $_dish['name'];
            $plate->ingredients = $_dish['ingredients'];
            $plate->description = $_dish['description'];
            $plate->price = $_dish['price'];
            $plate->image = $_dish['image'];
            $plate->visibility = $_dish['visibility'];

            $plate->save();
        }
    }
}