<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function index()
  {
    $restaurants = Restaurant::all();
    return view('guest.home', compact('restaurants'));
  }
}