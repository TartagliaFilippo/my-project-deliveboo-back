<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;

use Illuminate\Http\Request;

class DishController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $dishes = Dish::select("id", "restaurant_id", "name", "ingredients", "description", "price", "image")
      ->where('visibility', 1)
      ->get();
    return response()->json($dishes);
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $dishes = Dish::select("id", "restaurant_id", "name", "ingredients", "description", "price", "image")
      ->where('id', $id)
      ->where('visibility', 1)
      ->first();
    return response()->json($dishes);
  }

  public function dishesByRestaurant($restaurant_id)
  {
    $dishes = Dish::select("id", "restaurant_id", "name", "ingredients", "description", "price", "image")
      ->where('restaurant_id', $restaurant_id)
      ->where('visibility', 1)
      ->orderBy('name')
      ->with('restaurant:id,address,phone,image')

      ->get();

    // todo gestione immagini
    // foreach ($dishes as $dish) {
    //     // $post->content = $post->getAbstract(200);
    //     $dish->image = $dish->getAbsUriPlateImage();
    // }

    return response()->json($dishes);
  }
}