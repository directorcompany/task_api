@extends('layouts.app')

@section('content')

	<div class="card my-5"  style="width: 18rem;">
		<img src="{{asset('/storage/' . $product->image)}}" class="card-img-top" alt="...">
		<div class="card-header">
			<span class="card-title">{{$product->category->title}}</span>
			<h5 class="card-title">{{$product->title}}</h5>
		</div>
		<div class="card-body">
			<p class="card-text">{{$product->short_description}}</p>
			<p class="card-text">{{$product->full_description}}</p>
		</div>
	</div>

@endsection