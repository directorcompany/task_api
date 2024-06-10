@extends('layouts.app')

@section('content')
    <h3 class="text-center">Редактировать товар</h3>
   
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group py-2">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
        </div>
        <div class="form-group py-2">
            <label for="image" class="form-label">Картинка</label>
            <input type="file" class="form-control" value="{{ $product->image }}" name="image">
        </div>
        <div class="form-group py-2">
            <label for="short" class="form-label">Короткое описание</label>
            <input type="text" class="form-control" id="title" name="short_description" value="{{ $product->short_description }}">
        </div>
        <div class="form-group py-2">
            <label for="full" class="form-label">Полное описание</label>
            <textarea class="form-control" name="full_description" id="" cols="30" rows="10">{{$product->full_description}}</textarea>
        </div>

        <div class="form-group py-2">
            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id  }}" {{$product->category_id==$category->id ? 'selected' : ''}}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary my-2">Добавить</button>
    </form>
@endsection