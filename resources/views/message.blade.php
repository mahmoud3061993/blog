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
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($messages as $message)
      <td>{{$message->id}}</td>
      <td>{{$message->name}}</td>
      <td>{{$message->email}}</td>
      <td>{{$message->phone}}</td>
      <td>{{$message->message}}</td>
      <td><a class="btn btn-danger" href="{{url('/message/delete',$message->id)}}" role="button">Delete</a>
</td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
@endsection