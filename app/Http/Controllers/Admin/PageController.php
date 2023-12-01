<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function index()
  {
    // identifico l'utente
    $user = auth()->user();

    // vedo se ha un ristorante associato
    $hasRestaurant = Restaurant::where('user_id', $user->id)->exists();

    return view('admin.dashboard', [
      'hasRestaurant' => $hasRestaurant,
      'userName' => $user->name,
    ]);
  }
}