@extends('layouts.app')

@section('content')
    <div class="wrapper-home">
        <section class="container">
            <h1>Restaurants registered on our platform</h1>
            <div class="row my-3">
                @if ($restaurants)
                    @foreach ($restaurants as $restaurant)
                        <div class="col-4">
                            <div class="card p-3">
                                <img src="{{ asset('/storage/' . $restaurant->image) }}" class="card-img-top img-fluid">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $restaurant->name }}</h5>
                                    <p class="card-text text-center">{{ $restaurant->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3>You can be the first restaurateur to list the restaurant!</h3>
                @endif
            </div>
        </section>
    </div>
@endsection
