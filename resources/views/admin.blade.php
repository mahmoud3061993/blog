@extends('layouts/layout')
@section('title')
Login
@endsection
@section('word')
Scroll down to login
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
@if (session()->get('error'))
<div class="alert alert-danger">
{!! session()->get('error') !!}
</div>
@endif
<div class="container">
<form action="{{url('admin/login')}}" method="post" enctype='multipart/form-data'>
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">email</label>
    <input type="email" class="form-control" name='email' value="{{old('title')}}" id="exampleFormControlInput1" placeholder="Enter your title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">password</label>
    <input type="password" class="form-control" name='password' value="{{old('desc')}}" id="exampleFormControlInput1" placeholder="Enter your description">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
<br>
@endsection