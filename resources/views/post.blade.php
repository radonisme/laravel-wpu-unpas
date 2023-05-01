@extends('layouts/main')
@include('partials.navbar')


@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- IMAGE --}}
                @if ($post->image)
                    <div class="row" style="max-height: 300px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }} " alt="{{ $post->image }}" class="my-5">
                    </div>
                @else
                    {{-- <div class="row">
                        <img src="https://source.unsplash.com/1200X400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="">
                    </div> --}}
                @endif

                <h2 class="mt-3">{{ $post->tittle }}</h2>

                <p>By. <a href="/posts?author={{ $post->author->username }}">{{ $post->author->name }}</a> in <a
                        href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>

                {!! $post->body !!}

                <a href="/posts" class="d-block mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
