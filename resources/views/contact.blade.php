@extends('layouts/layout')
@section('title')
Conatct Us
@endsection
@section('word')
Scroll down to send message to support
@endsection
@section('content')
<br>

<div class="container">
@if (session()->get('error'))
<div class="alert alert-success" role="alert">
{!! session()->get('error') !!}
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{url('contact/save')}}" method="post" enctype='multipart/form-data'>
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" name='name' value="{{old('name')}}" id="exampleFormControlInput1" placeholder="Enter your name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">email</label>
    <input type="email" class="form-control" name='email' value="{{old('email')}}" id="exampleFormControlInput1" placeholder="Enter your email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Phone</label>
    <input type="number" class="form-control" name='phone' value="{{old('phone')}}" id="exampleFormControlInput1" placeholder="Enter your phone number">  </div>
  <div class="form-group">
  <label for="exampleInputPassword1">Message</label>
  <textarea class="form-control" name='message' id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Send message</button>
</form>
</div>
<br>
@endsection