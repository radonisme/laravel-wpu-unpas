@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts, {{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">

        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Buat Postingan Baru</a>

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tittle</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($posts as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->tittle }}</td>
                        <td>{{ $p->category->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $p->slug }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/posts/{{ $p->slug }}/edit" class="badge bg-danger"><span
                                    data-feather="edit"></span></a>

                            {{-- DELETE --}}
                            <form action="/dashboard/posts/{{ $p->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Postingan?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
