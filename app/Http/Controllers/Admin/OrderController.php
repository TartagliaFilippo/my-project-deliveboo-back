<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showOrders()
    {
        //recupero l'ID del ristorante
        $userRestaurant_id = Auth::user()->restaurant->id;

        //recupero tutti gli ordini con i relativi piatti
        $orders = Order::where('restaurant_id', $userRestaurant_id)
            ->with(['dishes' => function ($query) {
                $query->withPivot('quantity');
            }])
            ->orderByDesc('created_at')
            ->get();

        //passo l'id del ristorante specifico e i relativi ordini
        return view('admin.orders.index', compact('orders', 'userRestaurant_id'));
    }
}