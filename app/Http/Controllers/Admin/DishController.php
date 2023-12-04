<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DishController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * //@return \Illuminate\Http\Response
   */
  public function index()
  {
    $restaurant = Auth::user()->restaurant;

    if ($restaurant) {
      $dishes = $restaurant->dishes;

      return view('admin.dishes.index', compact('dishes'));
    }

    return view('admin.dishes.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * //@return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.dishes.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * //@return \Illuminate\Http\Response
   */
  public function store(StoreDishRequest $request)
  {
    $data = $request->validated();

    $dish = new Dish();
    $dish->fill($data);
    $dish->restaurant_id = Auth::id();

    // salvo le immagini nello storage
    if ($request->hasFile('image')) {
      $image_path = Storage::put('uploads/dishes/image', $data['image']);
      $dish->image = $image_path;
    }

    $dish->save();

    return redirect()->route('admin.dishes.index', $dish);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Dish  $dish
   * //@return \Illuminate\Http\Response
   */
  public function show(Dish $dish)
  {
    return view('admin.dishes.show', compact('dish'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Dish  $dish
   * //@return \Illuminate\Http\Response
   */
  public function edit(Dish $dish)
  {
    return view('admin.dishes.edit', compact('dish'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Dish  $dish
   * //@return \Illuminate\Http\Response
   */
  public function update(UpdateDishRequest $request, Dish $dish)
  {
    $data = $request->validated();

    $dish->fill($data);
    $dish->restaurant_id = Auth::id();

    // salvo le immagini nello storage
    if ($request->hasFile('image')) {
      $image_path = Storage::put('uploads/dishes/image', $data['image']);
      $dish->image = $image_path;
    }

    $dish->save();

    return redirect()->route('admin.dishes.show', $dish);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Dish  $dish
   * //@return \Illuminate\Http\Response
   */
  public function destroy(Dish $dish)
  {
    $dish->delete();
    return redirect()->route('admin.dishes.index');
  }

  public function visibility(Dish $dish, Request $request)
  {
    $data = $request->all();
    $dish->visibility = !Arr::exists($data, 'visibility') ? 1 : 0;
    $dish->save();

    return redirect()->back();
  }
}