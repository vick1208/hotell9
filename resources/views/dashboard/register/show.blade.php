@extends('dashboard.layouts.main')


@section('container')

{{-- @dd($reg); --}}
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/register" class="btn btn-success"><span data-feather="arrow-left"></span>Register Guest</a>
            <a href="/dashboard/register/{{ $reg->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>

            <form action="/dashboard/room/{{ $reg->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger " onclick="return confirm('Apakah Anda Ingin Menghapus?')"><span
                        data-feather="x-octagon"></span>Delete</button>
            </form>

            <h1>{{ $reg->guest->name }}</h1>
        </div>
    </div>
</div>


@endsection
