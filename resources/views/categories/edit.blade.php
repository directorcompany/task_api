@extends('layouts.app')

@section('content')
    <h3 class="text-center">Редактировать страницу</h3>
   
    <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group py-2">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
        </div>
        <div class="form-group py-2">
            <label for="image" class="form-label">Картинка</label>
            <input type="file" class="form-control" value="{{ $category->image }}" name="image">
        </div>
        <div class="form-group py-2">
            <label for="short" class="form-label">Короткое описание</label>
            <input type="text" class="form-control" id="title" name="short_description" value="{{ $category->short_description }}">
        </div>
        <div class="form-group py-2">
            <label for="full" class="form-label">Полное описание</label>
            <textarea class="form-control" name="full_description" id="" cols="30" rows="10">{{$category->full_description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary my-2">Добавить</button>
    </form>
@endsection