@extends('layout.master')
@section('content')
<div class="list-container m-4">
    <h1>Customer list</h1>
    <hr>
    <table class="table mt-5">
    @include('components.messages')
        <thead>
            <tr>
                <th>#</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$cust)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$cust->f_name}}</td>
                    <td>{{$cust->l_name}}</td>
                    <td class="email">{{$cust->email}}</td>
                    <td>
                        <div class="img-container">
                            <img src="{{asset($cust->img_path)}}">
                            <form action="{{route('change.profile',$cust->id)}}" enctype="multipart/form-data" method="POST" class="form">
                                @csrf
                                <input type="file" name="image">
                                <input type="submit"  class="btn btn-info btn-sm" value="upload">
                            </form>
                        </div>
                    </td>
                    <td>
                        <a href="{{route('customer.edit',$cust->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i>edit</a> 
                        <a href="{{route('delete.customer',$cust->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i>delete</a>
                        <a href="{{route('customer.mail',$cust->id)}}" class="btn btn-info"><i class="fa fa-envelope"></i>send mail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection