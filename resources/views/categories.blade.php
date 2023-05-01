{{-- @dd($post) --}}

@extends('layouts.main')

@include('partials.navbar')

@section('container')
    <div class="container">
        <div class="row">
            @foreach ($categories as $c)
                <div class="col-auto mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/500x500/?{{ $c->name }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/posts?category={{ $c->slug }}"
                                    class="text-decoration-none text-dark">{{ $c->name }}</a></h5>
                            <p class="card-text"></p>
                            <a href="#" class="btn btn-dark text-decoration-none ">Lihat</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
