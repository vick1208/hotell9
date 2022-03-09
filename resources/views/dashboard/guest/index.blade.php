@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Guest List</h1>
    </div>

    <div class="table-responsive col-lg-19">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="/dashboard/guest/create" class="btn btn-primary mb-3">Create new Guest</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Job</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $guest)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $guest->name }}</td>
                        <td>{{ $guest->address }}</td>
                        <td>{{ $guest->gender }}</td>
                        <td>{{ $guest->job }}</td>
                        <td>
                            <a href="/dashboard/guest/{{ $guest->id }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/guest/{{ $guest->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                            <form action="/dashboard/guest/{{ $guest->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                                        data-feather="x-octagon"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
