@extends('layouts/layout')
@section('title')
Home
@endsection
@section('word')
Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
@endsection
@section('content')
<section class="ftco-section">
   		<div class="container">
@foreach($posts as $post)

   			<div class="row">
   				<div class="col-md-12">
   					<div class="case">
   						<div class="row">
   							<div class="col-md-6 col-lg-6 col-xl-8 d-flex">
   								<a href="{{url('/show',$post->id)}}" class="img w-100 mb-3 mb-md-0" style="background-image: url({{$post->image}});"></a>
   							</div>
   							<div class="col-md-6 col-lg-6 col-xl-4 d-flex">
   								<div class="text w-100 pl-md-3">  									
   									<h2><a href='{{url("show",$post->id)}}'>{{$post->title}}</a></h2>
									   @foreach($post->users as $note)
              							Written by: {{$note->username}}
              							 @endforeach
   									<ul class="media-social list-unstyled">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>	
   								</div>
   							</div>
   						</div>
   					</div>	
   				</div>
   			</div>
   		
       @endforeach
       </div>
   	</section>
@endsection
