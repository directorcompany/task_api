@extends('layouts.app')

@section('content')
<div class="card my-5">
	<div class="card-header">
		<div class="row">
			<div class="col"><b>Описание</b></div>
				</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Название</b></label>
			<div class="col-sm-10">
				{{ $page->title }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Короткое описание</b></label>
			<div class="col-sm-10">
				{{ $page->short_description }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Полное описание</b></label>
			<div class="col-sm-10">
				{{ $page->full_description }}
			</div>
		</div>
	</div>
</div>

@endsection