@extends('layouts.app')

@section('content')
    <div class="wrapper-create-dish">
        <div class="container d-flex flex-column">
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary align-self-end my-3">
                Back to Menù
            </a>
            <div class="card">
                <div class="card-header">
                    <h2>Edit Dish "{{ $dish->name }}"</h2>
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

                    <form action="{{ route('admin.dishes.update', $dish) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf

                        {{-- Nome --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Dish name*:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') ?? $dish->name }}" required>
                        </div>

                        {{-- Ingredienti --}}
                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Ingredients*:</label>
                            <input type="text" class="form-control @error('ingredients') is-invalid @enderror"
                                id="ingredients" name="ingredients" value="{{ old('ingredients') ?? $dish->ingredients }}"
                                required>
                        </div>

                        {{-- Descrizione --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="5">{{ old('description' ?? $dish->description) }}</textarea>
                        </div>

                        {{-- Prezzo --}}
                        <div class="mb-3">
                            <label for="" class="form-label">Price*:</label>
                            <input type="number" min="0" max="100" step="0.01" id="price" name="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') ?? $dish->price }}">
                        </div>

                        {{-- Immagine --}}
                        <div class="row">
                            <div class="col-8 mb-3">
                                <label for="image" class="form-label">Image*:</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    value="{{ old('image') ?? $dish->image }}">
                            </div>
                            <div class="col-4 mt-2">
                                <img src="" class="img-fluid" id="image_preview">
                            </div>
                        </div>

                        {{-- Visibilità --}}
                        <div class="mb-3">
                            <label for="visibility" class="form-label">Visibility:</label>
                            <select name="visibility" id="visibility"
                                class="form-control @error('vsibility') is-invalid @enderror">
                                <option value="1">yes</option>
                                <option value="0" selected>no</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary my-3">Register your Dish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        const inputFileElement = document.getElementById('image');
        const ImagePreview = document.getElementById('image_preview');

        if (!ImagePreview.getAttribute('src')) {
            ImagePreview.src = "https://placehold.co/400";
        }

        inputFileElement.addEventListener('change', function() {
            const [file] = this.files;
            ImagePreview.src = URL.createObjectURL(file);
        })
    </script>
@endsection
