@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="card text-center w-50 px-0">
                <div class="card-header">Welcome!</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!$hasRestaurant)
                        <p class="card-text">You are logged in {{ $userName }}!, <a
                                href="{{ route('admin.restaurants.create') }}">click here</a>
                            for register your Restaurant</p>
                    @else
                        <p>Welcome back {{ $userName }}! It's always a pleasure to see you</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
