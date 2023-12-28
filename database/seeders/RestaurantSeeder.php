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
		$_restaurants = config('restaurants');

		foreach ($_restaurants as $_restaurant) {
			$restaurant = new Restaurant();
			$restaurant->user_id = $_restaurant['user_id'];
			$restaurant->name = $_restaurant['name'];
			$restaurant->address = $_restaurant['address'];
			$restaurant->address_number = $_restaurant['address_number'];
			$restaurant->image = $_restaurant['image'];
			$restaurant->description = $_restaurant['description'];
			$restaurant->phone = $_restaurant['phone'];

			$restaurant->save();
		}
	}
}