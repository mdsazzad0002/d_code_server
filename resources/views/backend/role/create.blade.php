@extends('backend.layouts.master')
@section('title', 'Roll & Permission Management')
@section('content')
    <div class="card mt-5">
        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <input type="text" name="name" id="Roll">
            @foreach ($permissions as $item)
                <input type="checkbox" class="form-control" name="permissions[]" value="{{ $item->id }}" id="permission{{ $item->id }}">
                <label for="permissions{{ $item->id }}">{{ $item->name }}</label>
            @endforeach

            <button class="btn btn-primary" type="submit">Save</button>
     
        </form>
    </div>
@endsection