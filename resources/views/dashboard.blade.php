@extends('layout.master')
@section('content')
<div class="container mt-3">
    <h1><i class="fa fa-plus-circle p-2 text-info"></i>Add customer</h1>
    <hr>
    <!-- <form method="post" action="{{route('add_customer')}}" entype="multipart/form-data">
        @include('components.messages')
        @csrf -->
       
     <form id="add_customer">
        
        <div class="mb-3">
            <label for="firstname">First name</label><span class="text-danger p-1">*</span>
            <input class="form-control" type="text" name="firstName" id="firstName" value=" {{ old('firstName') }}">
            <!-- <span class="text-danger">@error('firstName') {{ $message }} @enderror</span> -->
        </div>
        <div class="mb-3">
            <label for="firstname">Last name</label><span class="text-danger p-1">*</span>
            <input class="form-control" type="text" name="lastName" id="lastName" value=" {{ old('lastName') }}">
            <!-- <span class="text-danger">@error('lastName') {{ $message }} @enderror</span> -->
        </div>
        <div class="mb-3">
            <label for="firstname">Email</label><span class="text-danger p-1">*</span>
            <input class="form-control"  name="email" type="text" id="email" value=" {{ old('email') }}">
            <!-- <span class="text-danger">@error('email') {{ $message }} @enderror</span> -->
        </div>
        <!-- <div class="mb-3">
            <label for="firstname">Select image</label>
            <input class="form-control" type="file" id="image">
            <span class="text-danger">@error('file') {{ $message }} @enderror</span>
        </div> -->
        <hr>
       <p> Note: All the * fields are required.</p>
        <button class="btn btn-info" type="submit">Add customer</button>
        <!-- <input type="submit" class="btn btn-info" value="value"> -->
    </form> 
</div>
@endsection
    