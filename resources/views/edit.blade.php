@extends('layout.master')
@section('content')
<div class="container mt-5">
    <div class="">
        <h1 class="pb-2"> Update details</h1>
            @foreach ($data as $d)
            <form action="{{route('update.customer', $d->id)}}" method="POST">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="firstName" value="{{$d->f_name}}">
                    <span class="text-danger">@error('firstName'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="lastName" value="{{$d->l_name}}">
                    <span class="text-danger">@error('lastName'){{ $message }}@enderror</span>
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" name="email" value="{{$d->email}}">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <a href="{{route('list')}}" class="btn btn-dark">Back</a>
                <input class="btn btn-success" value="Update" type="submit">
            @endforeach
        </form> 
    </div>
</div>
@endsection