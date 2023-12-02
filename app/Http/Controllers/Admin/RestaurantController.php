<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRestaurantRequest;
use App\Models\Restaurant;
use App\Models\Type;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $restaurant = Auth::user()->restaurant;
    return view('admin.restaurants.index', compact('restaurant'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $types = Type::all();
    return view('admin.restaurants.create', compact('types'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * * @return \Illuminate\Http\Response
   */
  public function store(StoreRestaurantRequest $request)
  {
    $data = $request->validated();

    $restaurant = new Restaurant();
    $restaurant->fill($data);
    $restaurant->user_id = Auth::id();

    // salvo le immagini nello storage
    if ($request->hasFile('image')) {
      $image_path = Storage::put('uploads/restaurants/image', $data['image']);
      $restaurant->image = $image_path;
    }

    $restaurant->save();

    // asscocio i tipi al ristorante
    $restaurant->types()->attach($request->input('types'));

    return redirect()->route('admin.restaurants.index', $restaurant);
  }
}