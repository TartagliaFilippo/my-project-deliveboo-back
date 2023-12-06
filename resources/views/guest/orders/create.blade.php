@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="wrapper create order">
        <div class="container d-flex flex-column">
            <a href="{{ route('guest.home') }}" class="btn btn-primary align-self-end my-3">
                <i class="fa-solid fa-arrow-left"></i> Back to Home
            </a>
        </div>
        <div class="card">
            <div class="card-header">
                <h2>Insert your Order</h2>
            </div>

            <div class="card-body px-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="my-3 text-danger">Fields with "*" are required</div>

                <form action="{{ route('guest.orders.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Nome --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name*:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>
                    </div>

                    {{-- Cognome --}}
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Lastname*:</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname"
                            name="lastname" value="{{ old('lastname') }}" required>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email*:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required>
                    </div>

                    {{-- Telefono --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone*:</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" value="{{ old('phone') }}" required>
                    </div>

                    {{-- Indirizzo --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Address*:</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" value="{{ old('address') }}" required>
                    </div>

                    {{-- Numero indirizzo --}}
                    <div class="mb-3">
                        <label for="address_number" class="form-label">Address Number*:</label>
                        <input type="text" class="form-control @error('address_number') is-invalid @enderror"
                            id="address_number" name="address_number" value="{{ old('address_number') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Register your Order</button>
                </form>
            </div>
        </div>
    @endsection
