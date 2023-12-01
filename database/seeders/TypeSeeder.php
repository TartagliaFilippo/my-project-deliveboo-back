<?php

namespace Database\Seeders;

use App\Models\Type;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = ['Italian', 'International', 'Chinese', 'Japanese', 'Mexican', 'Indian', 'Fish', 'Meat', 'Pizza', 'Vegetarian', 'Fast Food', 'Food Truck', 'Tavern', 'Pub', 'Piadineria', 'Greek'];

        foreach ($labels as $label) {
            $type = new Type();
            $type->name = $label;
            $type->save();
        }
    }
}