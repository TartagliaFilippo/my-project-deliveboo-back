<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $restaurantId = Restaurant::first()->id;

        $order = new Order();
        $order->restaurant_id = $restaurantId;
        $order->name = 'marco';
        $order->lastname = 'grandi';
        $order->email = 'marco@grandi.it';
        $order->phone = '34567289765';
        $order->address = 'vai del busto';
        $order->address_number = '34b';
        $order->success = 1;
        $order->date = '2023-12-04 20:19:09';
        $order->total = '10.00';

        $order->save();
    }
}