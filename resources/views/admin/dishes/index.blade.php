@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="wrapper-index-dishes">
        <div class="container d-flex flex-column">
            <h1>Your Dishes</h1>
            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary align-self-end mt-3 mb-1">
                <i class="fa-solid fa-arrow-left"></i> Back to Restaurant
            </a>
            @if (!$dishes->isEmpty())
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-warning align-self-end mt-1 mb-3">
                    <i class="fa-solid fa-plus"></i> Create a Dish
                </a>
            @endif
            @if (!$dishes->isEmpty())
                <div class="row">
                    @foreach ($dishes as $dish)
                        <div class="col-12 col-md-6 col-lg-4 my-3">
                            <div class="card h-100">
                                <img src="{{ asset('/storage/dishes/' . $dish->image) }}" class="card-img-top img-fluid"
                                    alt="...">
                                <div class="card-body d-flex flex-column">
                                    <div class="card-title d-flex justify-content-between align-items-center">
                                        <h3>{{ $dish->name }}</h3>
                                        <div class="visibility-container d-flex flex-column">
                                            <span>Visibility</span>
                                            <form action="{{ route('admin.dishes.visibility', $dish) }}" method="POST"
                                                id="form-visibility-{{ $dish->id }}">
                                                @method('PATCH')
                                                @csrf
                                                <label class="switch">
                                                    <input type="checkbox" name="visibility"
                                                        @if ($dish->visibility) checked @endif>
                                                    <span class="slider round checkbox-visibility"
                                                        data-id="{{ $dish->id }}">
                                                    </span>
                                                </label>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body d-flex flex-column align-items-center g.2">
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Ingredients:</h6>
                                        <p class="card-text text-center">{{ $dish->ingredients }}</p>
                                        <h6 class="card-subtitle mb-2 text-body-secondary">Description:</h6>
                                        <p class="card-text text-center">{{ $dish->description }}</p>
                                        <p class="fw-bold">Price: {{ $dish->price }} €</p>
                                    </div>
                                    <div class="links-sed d-flex flex-column">
                                        <a href="{{ route('admin.dishes.show', $dish) }}" class="btn btn-primary my-1">
                                            <i class="fa-solid fa-eye"></i> Show Dish
                                        </a>
                                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning my-1">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit Dish
                                        </a>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#delete-modal-{{ $dish->id }}" class="btn btn-danger my-1">
                                            <i class="fa-solid fa-trash"></i> Delete Dish
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Menu is empty!</h5>
                                <p class="card-text">You don't haven't created any dishes. Create your first dish:
                                    <a href="{{ route('admin.dishes.create') }}">Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('modals')
    @foreach ($dishes as $dish)
        <div class="modal fade" id="delete-modal-{{ $dish->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete element</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you really want delete "{{ $dish->name }}"?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script>
        const checkboxesVisibility = document.getElementsByClassName('checkbox-visibility');
        console.log(checkboxesVisibility);
        for (checkbox of checkboxesVisibility) {
            checkbox.addEventListener('click', function() {
                const idPlate = this.getAttribute('data-id');
                const form = document.getElementById('form-visibility-' + idPlate);
                form.submit();
            })
        }
    </script>
@endsection
