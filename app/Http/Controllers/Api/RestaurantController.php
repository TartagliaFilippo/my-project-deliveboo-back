<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * //@return \Illuminate\Http\Response
   */
  public function index()
  {
    $restaurants = Restaurant::select('id', 'name', 'address', 'address_number', 'image', 'description', 'phone')
      ->orderBy('name')
      ->with([
        'types:id,name',
      ])
      ->get();

    return response()->json($restaurants);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * //@return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $restaurant = Restaurant::select('id', 'name', 'address', 'address_number', 'image', 'description', 'phone')
      ->where('id', $id)
      ->with(['types:id,name'])
      ->first();

    return response()->json($restaurant);
  }

  public function restaurantsByTypes(Request $request)
  {

    $filters = $request->all();

    $restaurants_query = Restaurant::select('id', 'name', 'address', 'address_number', 'image', 'description', 'phone')
      ->with('types:id,name')
      ->orderByDesc('id');

    if (!empty($filters['activeTypes'])) {
      $restaurants_query->whereHas('types', function ($query) use ($filters) {
        $query->where('type_id', $filters['activeTypes']);
      });
    }

    $restaurants = $restaurants_query->get();

    return response()->json($restaurants);
  }
}