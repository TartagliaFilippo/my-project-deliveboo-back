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
        $_orders = config('orders');

        foreach ($_orders as $_order) {
            $order = new Order();
            $order->restaurant_id = $_order['restaurant_id'];
            $order->name = $_order['name'];
            $order->lastname = $_order['lastname'];
            $order->email = $_order['email'];
            $order->phone = $_order['phone'];
            $order->address = $_order['address'];
            $order->address_number = $_order['address_number'];
            $order->total = $_order['total'];

            $order->save();
        }
    }
}