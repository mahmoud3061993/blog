@extends('layouts/layout')
@section('title')
register
@endsection
@section('word')
Scroll down to register
@endsection
@section('content')
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
<form action="{{url('/cp/update/save',$users->id)}}" method="post" enctype='multipart/form-data'>
@csrf

    <div class="form-group">
    <label for="exampleFormControlInput1">username</label>
    <input type="text" class="form-control" name='username' value="{{$users->username}}" id="exampleFormControlInput1" placeholder="Enter your title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">email</label>
    <input type="email" class="form-control" name='email' value="{{$users->email}}" id="exampleFormControlInput1" placeholder="Enter your title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">password</label>
    <input type="password" class="form-control" name='password' value="{{$users->password}}" id="exampleFormControlInput1" placeholder="Enter your description">
  </div>
  
  <button type="submit" class="btn btn-primary">Register</button>

</form>
</div>
<br>
@endsection