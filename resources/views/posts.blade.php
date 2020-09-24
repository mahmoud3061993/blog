@extends('layouts/layout')

@section('title')
All Posts
@endsection
@section('word')
Here you can see all your posts!
@endsection
@section('content')
<br>
<section class="ftco-section bg-light">
      <div class="container">
      <div class="row d-flex">

@foreach($posts as $post)

<div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="{{url('/show',$post->id)}}" class="block-20" style="background-image: url({{$post->image}});">
              </a>
              <div class="text p-4 float-right d-block">
              @foreach($post->users as $note)
              Written by: {{$note->username}}
               @endforeach
              	<h3 class="heading mb-3"><a href="{{url('/show',$post->id)}}">{{$post->title}}</a></h3>
                <p>{{$post->desc}}</p>
              </div>
            </div>
          </div>
          
@endforeach
</div>

</div>
</section>
<br>
@endsection

