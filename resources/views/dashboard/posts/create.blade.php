@extends('dashboard.layouts.main')

@section('container')

    <head>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    </head>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new posts</h1>
    </div>

    {{-- FORM --}}
    <div class="col-lg-8 ">
        {{-- enctype untuk menangani inputan file --}}
        <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
            @csrf

            {{-- TITTLE --}}
            <div class="mb-3">
                <label for="tittle" class="form-label">Tittle</label>
                <input type="text" class="form-control @error('tittle') is-invalid @enderror " id="tittle"
                    name="tittle" required autofocus value="{{ old('tittle') }}">
                @error('tittle')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- SLUG --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- KATEGORI --}}
            <div class="mb-4">
                <label for="kategori" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $c)
                        @if (old('category_id') == $c->id)
                            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                        @else
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- INPUT GAMBAR --}}
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- BODY --}}
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
                {{-- Dari trix-editor masuk keinput diatasnya lalu dikirim ke controller --}}
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Posting</button>
        </form>
    </div>

    <script>
        const tittle = document.querySelector('#tittle');
        const slug = document.querySelector('#slug');

        tittle.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?tittle=' + tittle.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {

            const image = document.querySelector('#image');
            // # = mengambil id

            const imgPreview = document.querySelector('.img-preview');
            // mengambil class img-preview

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection
