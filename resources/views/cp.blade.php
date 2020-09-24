@extends('layouts/layout')
@section('title')
Poeple messages
@endsection
@section('word')
Here you can see all people messages!
@endsection
@section('content')
<br>
<div class='container'>
<div style="text-align:center;">
<a center class="btn btn-primary" href="{{url('cp/new')}}" role="button">Create new admin</a>
</div>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">username</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($users as $user)
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td>
      <a class="btn btn-danger" href="{{url('/cp/delete',$user->id)}}" role="button">Delete</a>
      <a class="btn btn-primary" href="{{url('/cp/update',$user->id)}}" role="button">Update</a>
</td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
@endsection