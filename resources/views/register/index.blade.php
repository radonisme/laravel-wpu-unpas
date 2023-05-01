@extends('layouts.main')
@include('partials.navbar')

@section('container')
    {{-- Row dibawah ini berupa flex bisa langsung dijustify --}}
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-registration w-100 m-auto">
                <h1 class="h3 mb-3 mt-3 fw-normal fs-3 text-center">Register Form</h1>
                <form action="/register" method="post">
                    @csrf

                    {{-- Name --}}
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Username --}}
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('name') is-invalid @enderror"
                            id="username" placeholder="Username" required value="{{ old('username') }}"">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="Email" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Button --}}
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center">Already Registered?
                    <a href="/login">Login!</a>
                </small>
            </main>
        </div>
    </div>
@endsection
