@extends('layouts.app')

@section('content')
    <h2 class="text-center my-2">Категория</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-info float-start">Новая страница</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Названия</th>
                <th>Картинка</th>
                <th>Короткая описания</th>
                <th>Полная описания</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{ $category->title }}</td>
                    <td><img src="{{ asset('storage/' . $category->image) }}" height = "40" width = "40" alt="картинка"></td>
                    <td>{{$category->short_description}}</td>
                    <td>{{$category->full_description}}</td>
                    <td>
                        <a href="{{route('categories.show',$category->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye fa-lg"></i></a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-book text-white"></i></a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$categories->links('pagination::bootstrap-5')}}
@endsection