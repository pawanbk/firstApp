@extends('layout.master')
@section('content')
    <div class="mail-container mt-4">
        <form action="{{route('send.mail')}}" class="form" method="post">
            @include('components.messages')
            @csrf
            <div class="mb-3">
                <label for="to">To:</label>
                <input type="text" class="form-control mt-2" name ="email" value="{{$email}}">
            </div>
            <div class="mb-3">
                <label for="to">Subject:</label>
                <input type="text" name="subject" class="form-control mt-2" placeholder="subject here......">
                <span class="text-danger">@error('subject'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <label for="to">Message</label>
                <textarea class="form-control mt-2" placeholder="message here......" rows="9" cols="50" name="message"></textarea>
                <span class="text-danger">@error('message'){{$message}}@enderror</span>
            </div>
            <div class="mb-3">
                <a href="{{route('index')}}" class="btn btn-dark">Back</a>
                <input type="submit" class="btn btn-success" value="send">
            </div>
        </form>
    </div>
@endsection