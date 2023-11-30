<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$userId = User::first()->id;

		$restaurant = new Restaurant();
		$restaurant->user_id = $userId;
		$restaurant->name = "Il mio ristorante";
		$restaurant->address = 'Via dei ristoratori';
		$restaurant->address_number = '38b';
		$restaurant->image = 'ristorante.webp';
		$restaurant->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore veritatis odio sint accusamus velit impedit quaerat unde cumque a';
		$restaurant->phone = '3495410451';

		$restaurant->save();
	}
}