@extends('layouts.app')

@section('content')
    <h2 class="text-center my-2">Товары</h2>
    <a href="{{ route('products.create') }}" class="btn btn-info float-start">Новая страница</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Названия</th>
                <th>Картинка</th>
                <th>Короткая описания</th>
                <th>Полная описания</th>
                <th>Категория</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->title }}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}" height = "40" width = "40" alt="картинка"></td>
                    <td>{{ $product->short_description }}</td>
                    <td>{{ $product->full_description }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td>
                        <a href="{{route('products.show',$product->id)}}" class="btn btn-sm btn-success"><i class="fas fa-eye fa-lg"></i></a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-book text-white"></i></a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links('pagination::bootstrap-5') }}
@endsection