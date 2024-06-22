@extends('backend.layouts.master')
@section('title', 'Roll & Permission Management')
@section('content')

@foreach ($roles as $item)

<div class="card mt-5">
    <div class="card-bdoy">

<label >{{ $item->name }}</label>
<p>
    @foreach ($item->permissions as $permission)
        {{ $permission->name }}
    @endforeach
</p>
<form action="{{ route('role.destroy', $item->id ) }}" method="POST">
    @csrf
    @method('DELETE')
    <button href="">delete</button>
</form>
<a href="{{ route('role.edit',  $item->id ) }}">edit</a>
</div>
</div>
@endforeach

<a href="{{ route('role.create') }}">create</a>

@endsection