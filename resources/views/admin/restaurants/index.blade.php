@extends('layouts.app')

@section('content')
    <div class="wrapper-restaurants">
        <div class="container">
            <h1>Your Restaurant</h1>
            @if ($restaurant)
                <div class="row justify-content-end">
                    <a class="btn btn-primary w-auto" href="{{ route('admin.orders.index') }}">Look at your
                        orders</a>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="card w-50 my-3">
                            <img src="{{ asset('/storage/' . $restaurant->image) }}" class="card-img-top img-fluid"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $restaurant->name }}</h5>
                                <div class="card-body d-flex flex-column align-items-center">
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Type of restaurant:</h6>
                                    <p>
                                        @foreach ($restaurant->types as $type)
                                            <span class="badge text-bg-info">{{ $type->name }}</span>
                                        @endforeach
                                    </p>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Address:</h6>
                                    <p class="card-text">{{ $restaurant->address }}, {{ $restaurant->address_number }}</p>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">Description:</h6>
                                    <p class="card-text text-center">{{ $restaurant->description }}</p>
                                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary mb-3">Look your
                                        menù</a>
                                    <div class="phone">
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                            Phone Number:
                                            <span class="badge text-bg-success">{{ $restaurant->phone }}</span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3>You don't have any registered restaurant yet, if you want to register
                    <a class="btn btn-primary" href="{{ route('admin.restaurants.create') }}">Click here</a>
                </h3>
            @endif
        </div>
    </div>
@endsection
