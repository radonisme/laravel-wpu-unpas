@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">


                {{-- ACTION --}}
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning text-white"><span
                        data-feather="edit"></span>Edit</a>

                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline ">
                    @method('delete')
                    @csrf
                    <button class="btn bg-danger border-0 text-white" onclick="return confirm('Delete?')"><span
                            data-feather="x-circle"></span>Delete</button>
                </form>

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

                <h2 class="my-3">{{ $post->tittle }}</h2>

                <p>
                    {!! $post->body !!}
                </p>
            </div>
        </div>
    </div>
@endsection
