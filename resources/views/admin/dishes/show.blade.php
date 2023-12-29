@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="wrapper-show-dish">
        <div class="container d-flex flex-column">
            <h2>Detail Dish</h2>
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary align-self-end mt-3 mb-1">
                Back to Menù
            </a>
            <div class="row justify-content-center">
                <div class="col-6 my-4">
                    <div class="card">
                        <img src="{{ asset('/storage/' . $dish->image) }}" class="card-img-top img-fluid" alt="...">
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
                                            <span class="slider round checkbox-visibility" data-id="{{ $dish->id }}">
                                            </span>
                                        </label>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body d-flex flex-column align-items-center">
                                <h6 class="card-subtitle mb-2 text-body-secondary">Ingredients:</h6>
                                <p class="card-text">{{ $dish->ingredients }}</p>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Description:</h6>
                                <p class="card-text text-center">{{ $dish->description }}</p>
                                <p class="fw-bold">Price: {{ $dish->price }} €</p>
                            </div>
                            <div class="links-sed d-flex justify-content-around">
                                <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit Dish
                                </a>
                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#delete-modal-{{ $dish->id }}" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i> Delete Dish
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
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
