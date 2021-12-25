<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
</head>
<body>
    <div class="login-container mt-5">
        <h1>Admin login</h1>
        <hr>
        <form action="{{route('auth.login')}}" class="form" method="POST">
            @include('components.messages')
            @csrf
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" class="form-control" placeholder="email or username" name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" class="form-control" placeholder="password" name="password">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <div class="col-md-6 p-3"> {!! htmlFormSnippet() !!} </div>
                <span class="text-danger p-3">@error('g-recaptcha-response') {{$message}} @enderror</span>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-info form-control text-white" value="login">
            </div>
        </form>
    </div>
</body>
</html>