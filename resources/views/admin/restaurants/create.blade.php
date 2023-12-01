@extends('layouts.app')

@section('content')
    <div class="container mt-4">

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

        <form action="{{ route('admin.restaurants.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Nome --}}
            <div class="mb-3">
                <label for="name" class="form-label">Restaurant name*:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    required>
            </div>

            {{-- Indirizzo --}}
            <div class="mb-3">
                <label for="address" class="form-label">Address*:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"
                    required>
            </div>

            {{-- Numero Civico --}}
            <div class="mb-3">
                <label for="address_number" class="form-label">Address number*:</label>
                <input type="text" class="form-control" id="address_number" name="address_number"
                    value="{{ old('address_number') }}" required>
            </div>

            {{-- Tipologia --}}
            <div class="mb-3">
                <label class="form-label">Type of Restaurant*:</label>
                <div class="d-flex flex-column">
                    @foreach ($types as $type)
                        <div>
                            <input type="checkbox" id="type{{ $type->id }}" name="types[]" value="{{ $type->id }}"
                                @if (in_array($type->id, old('types', []))) checked @endif>
                            <label for="types{{ $type->id }}">{{ $type->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Immagine --}}
            <div class="row">
                <div class="col-8 mb-3">
                    <label for="image" class="form-label">Image*:</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                    @error('image')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4 mt-2">
                    <img src="" class="img-fluid" id="image_preview">
                </div>
            </div>

            {{-- Descrizione --}}
            <div class="mb-3">
                <label for="description" class="form-label">Restaurant description:</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            {{-- Numero di Telefono --}}
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number*:</label>
                <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]+"
                    value="{{ old('phone') }}" required>
            </div>

            <button type="submit" class="btn btn-primary my-3">Register your Restaurant</button>
        </form>
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
