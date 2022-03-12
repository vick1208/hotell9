@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Room </h1>
</div>

<div class="col-lg-18">
    <form action="/dashboard/room/{{ $room->id }}" method="post" class="mb-5">
        @method('put')
        @csrf

        <div class="mb-3">
            <label for="type" class="form-label">Room Type</label>
            <select class="form-select" name="type_id">
               @foreach ( $types as $type)
                @if (old('type_id',$room->type_id)== $type->id)
                <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                @else
                <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endif
               @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Room Status</label>
            <select class="form-select" name="room_status_id">
               @foreach ( $status as $stat)
                @if (old('room_status_id',$room->room_status_id)== $stat->id)
                <option value="{{ $stat->id }}" selected>{{ $stat->name }}</option>
                @else
                <option value="{{ $stat->id }}">{{ $stat->name }}</option>
                @endif
               @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Number</label>
            <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number"
                value="{{ old('number',$room->number) }}">

            @error('number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="number" step="1" class="form-control @error('capacity') is-invalid @enderror" id="capacity" name="capacity"
                value="{{ old('capacity',$room->capacity) }}">

            @error('capacity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ old('price',$room->price) }}">

            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="view" class="form-label">View</label>
            @error('view')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="view" type="hidden" name="view" value="{{ old('view',$room->view) }}">
            <trix-editor input="view"></trix-editor>
        </div>

        <button type="submit" class="btn btn-warning">Update Room</button>

    </form>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
</script>

@endsection
