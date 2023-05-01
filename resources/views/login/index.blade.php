@extends('layouts.main')
@include('partials.navbar')

@section('container')
    {{-- Row dibawah ini berupa flex --}}
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade-show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
                    </button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade-show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close">
                    </button>
                </div>
            @endif

            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 mt-3 fw-normal fs-3 text-center">Admin</h1>

                {{-- FORM --}}
                <form action="/login" method="post">
                    @csrf

                    {{-- Email --}}
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="d-block text-center">Not Registered?
                    <a href="/register">Register!</a>
                </small>
            </main>
        </div>
    </div>
@endsection
