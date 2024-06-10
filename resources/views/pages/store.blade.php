@extends('layouts.app')
@section('content')
    <h3 class="text-center my-3">Добавить новую страницу</h3>
    <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="short" class="form-label">Короткое описание</label>
            <input type="text" class="form-control" id="title" name="short_description">
        </div>
        <div class="form-group">
            <label for="full" class="form-label">Полное описание</label>
            <textarea class="form-control" name="full_description" id="" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary my-2">Добавить</button>
    </form>
@endsection