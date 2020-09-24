@extends('layouts/layout')
@section('title')
Create
@endsection
@section('word')
Scroll down to add new post
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
<form action="{{url('/save')}}" method="post" enctype='multipart/form-data'>
@csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" name='title' value="{{old('title')}}" id="exampleFormControlInput1" placeholder="Enter your title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Description</label>
    <input type="text" class="form-control" name='desc' value="{{old('desc')}}" id="exampleFormControlInput1" placeholder="Enter your description">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Content</label>
    <textarea class="form-control" name='content' id="exampleFormControlTextarea1" rows="3"></textarea>    </div>
  <div class="form-group">
  <label for="exampleInputPassword1">Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Add Post</button>
</form>
</div>
<br>
@endsection