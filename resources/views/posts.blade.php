{{-- @dd($post) -- Vardump versi laravel --}}
{{-- @dd(request('category')); --}}


@extends('layouts.main')

@include('partials.navbar')

@section('container')
    <h1 class="mb-3 text-center"><strong><em>{{ $tittle }}</em></strong></h1>

    {{-- SEARCH BAR --}}
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif

                <div class="input-group mb-3">
                    {{-- dalam input form, tag name akan digunakan/dipanggil saat Request --}}
                    <input type="text" class="form-control" placeholder="Masukkan kata kunci" name="cari"
                        value="{{ request('cari') }}">
                    <button class="btn btn-dark" type="submit" id="cari">Cari</button>
                </div>
            </form>
        </div>
    </div>


    {{-- Hasil Pertama --}}
    @if ($posts->count())
        <div class="card mb-3">
            <div class="position-absolute bg-dark px-3 py-2 text-white" style="background-color : rgba(0, 0, 0, 0.7)">
                <a href="/posts?category={{ $posts[0]->category->slug }}"
                    class="text-decoration-none text-white">{{ $posts[0]->category->name }}</a>
            </div>

            @if ($posts[0]->image)
                <div class="row" style="max-height: 300px; overflow:hidden">
                    <img src="{{ asset('storage/' . $posts[0]->image) }} " alt="{{ $posts[0]->image }}" class="my-5">
                </div>
            @else
                <div class="row">
                    <img src="https://source.unsplash.com/1200X400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="">
                </div>
            @endif

            {{-- <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="..."> --}}

            <div class="card-body">
                <h3 class="card-title text-center mb-0">{{ $posts[0]->tittle }}</h3>
                <p class="text-center mb-2">
                    <small>
                        By. <a href="/posts?author={{ $posts[0]->author->username }}"
                            class="text-decoration-none text-dark">{{ $posts[0]->author->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-dark">Read More</a>
            </div>
        </div>
        {{-- Hasil ke-2 dan seterusnya --}}
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $p)
                    <div class="col-4 mb-3">
                        <div class="card" style="width: 18rem;">
                            <div class="position-absolute bg-dark px-3 py-2 text-white"
                                style="background-color : rgba(0, 0, 0, 0.7)"><a
                                    href="/posts?category={{ $p->category->slug }}"
                                    class="text-decoration-none text-white">{{ $p->category->name }}</a>
                            </div>

                            @if ($p->image)
                                <img src="{{ asset('storage/' . $p->image) }} " alt="{{ $p->image }}"
                                    class="img-fluid">
                            @else
                                <div class="row">
                                    <img src="https://source.unsplash.com/200X200?{{ $p->category->name }}"
                                        alt="{{ $p->category->name }}" class="card-img-top">
                                </div>
                            @endif

                            <div class="card-body">
                                <h5 class="card-tittle mb-0">
                                    {{ $p->tittle }}
                                </h5>
                                <p class="mb-2"><small>By. <a href="/posts?author={{ $p->author->username }}"
                                            class="text-decoration-none text-dark">{{ $p->author->name }}</a>
                                    </small></p>

                                <p><em>{{ $p->excerpt }}</em></p>

                                <a href="/posts/{{ $p->slug }}" class="text-decoration-none btn btn-dark">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4"> No post found </p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection
