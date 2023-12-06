@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="wrapper-home">
        <section class="container d-flex flex-column">
            <h1>Restaurants registered on our platform</h1>
            <a href="{{ route('guest.orders.create') }}" class="btn btn-warning align-self-end my-3">
                <i class="fa-solid fa-plus"></i> Make a Order
            </a>
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
