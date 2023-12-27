<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Request;
use Braintree\Gateway;

class OrderController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string',
      'lastname' => 'required|string',
      'email' => 'nullable|email',
      'phone' => 'required|string',
      'address' => 'required|string',
      'address_number' => 'required|string',
      'total' => 'required|numeric',
      'cart' => 'required|array'
    ]);

    $order = Order::create([
      'name' => $request->name,
      'lastname' => $request->lastname,
      'email' => $request->email,
      'phone' => $request->phone,
      'address' => $request->address,
      'address_number' => $request->address_number,
      'total' => $request->total,
    ]);

    foreach ($request->cart as $cartItem) {
      $dish_id = $cartItem['id']; // Supponendo che ci sia un campo 'id' nell'elemento del carrello
      $quantity = $cartItem['quantity']; // Supponendo che ci sia un campo 'quantity' nell'elemento del carrello

      // Trova il piatto dal carrello
      $dish = Dish::find($dish_id);

      // Aggiungi il piatto all'ordine nella tabella ponte con la quantità
      $order->dishes()->attach($dish_id, ['quantity' => $quantity]);
    }

    return response()->json(['message' => 'Ordine ricevuto con successo', 'order' => $order], 201);
  }

  public function Generate(Request $request, Gateway $gateway, Order $order)
  {
    $token = $gateway->clientToken()->generate();
    $data = [
      'success' => true,
      'token' => $token
    ];
    return response()->json($data, 200);
  }

  public function MakePayment(Request $request, Gateway $gateway, Order $order)
  {
    $result = $gateway->transaction()->sale([
      'amount' => $request->amount,
      'paymentMethodNonce' => $request->token,
      'options' => [
        'submitForSettlement' => true
      ]
    ]);
    if ($result->success) {
      $data = [
        'message' => 'Transazione eseguita correttamente',
        'success' => true
      ];
      return response()->json($data, 200);
    } else {
      $data = [
        'message' => 'Transazione rifiutata',
        'success' => false,
        'error' => $result->message,
      ];
      return response()->json($data, 401);
    }
  }
}