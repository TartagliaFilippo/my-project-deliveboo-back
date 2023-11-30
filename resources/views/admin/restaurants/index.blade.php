@extends('layouts.app')

@section('content')
    <div class="wrapper-restaurants">
        <div class="container">
            <h1>Il tuo Ristorante</h1>
            @if ($restaurant)
                <div class="card">
                    <img src="{{ asset('/storage/' . $restaurant->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $restaurant->name }}</h5>
                        <div class="card-body d-flex flex-column align-items-center">
                            <h6 class="card-subtitle mb-2 text-body-secondary">Type of restaurant:</h6>
                            <p>
                                {{-- @foreach ($restaurant->types as $type)
                                    <span class="badge text-bg-info">{{ $type->name }}</span>
                                @endforeach --}}
                            </p>
                            <p class="card-text">{{ $restaurant->address }}, {{ $restaurant->address_number }}
                            </p>
                            <p class="card-text text-center">{{ $restaurant->description }}</p>
                            {{-- <a href="{{ route('admin.plates.index') }}" class="btn btn-primary">Vedi il menù</a> --}}
                            <div class="phone">
                                <span class="badge text-bg-success">{{ $restaurant->phone }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3>You don't have any registered restaurant yet, if you want to register
                    <a class="btn btn-primary" href="{{ route('admin.restaurants.create') }}">Register your Restaurant</a>
                </h3>
            @endif
        </div>
    </div>
@endsection
