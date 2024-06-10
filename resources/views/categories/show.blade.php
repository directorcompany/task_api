@extends('layouts.app')

@section('content')

	<div class="card my-5"  style="width: 18rem;">
		<img src="{{asset('/storage/' . $category->image)}}" class="card-img-top" alt="...">
		<div class="card-header">
			<h5 class="card-title">{{$category->title}}</h5>
		</div>
		<div class="card-body">
			<p class="card-text">{{$category->short_description}}</p>
			<p class="card-text">{{$category->full_description}}</p>
		</div>
	</div>

@endsection