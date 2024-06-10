@extends('layouts.app')

@section('content')
    <h2 class="text-center my-2">Страницы</h2>
    <a href="{{ route('pages.create') }}" class="btn btn-info float-start">Новая страница</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Названия</th>
                <th>Короткая описания</th>
                <th>Полная описания</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{$page->short_description}}</td>
                    <td>{{$page->full_description}}</td>
                    <td>
                        <a href="{{route('pages.show',$page->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye fa-lg"></i></a>
                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-book text-white"></i></a>
                        <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$pages->links('pagination::bootstrap-5')}}
@endsection