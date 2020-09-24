@extends('layouts/layout')

@section('title')
Post number ( {{$post->id}} )
@endsection
@section('word')
Post number ( {{$post->id}} )
@endsection
@section('content')

<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
          	<p class="mb-5">
              <img src='{{asset($post->image)}}' alt="" class="img-fluid">
            </p>
            @foreach($post->users as $note)
              Written by: {{$note->username}}
               @endforeach
            <h2 class="mb-3">{{$post->title}}</h2>
            <p>{{$post->desc}}</p>
            <p>{{$post->content}}</p>
            @if(Auth::user()->is_admin==1)
            <a class="btn btn-danger" href="{{url('delete',$post->id)}}" role="button">Delete</a>
            <a class="btn btn-success" href="{{url('edit',$post->id)}}" role="button">Edit</a>
            @endif
            </div>
            </div>
            </div>
    </section>
  
@endsection


