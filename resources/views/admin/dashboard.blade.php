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
                    <p class="card-text">You are logged in!, <a href="{{ route('admin.restaurants.create') }}">click here</a>
                        for
                        register your Restaurant</p>
                </div>
            </div>
        </div>
    </div>
@endsection
