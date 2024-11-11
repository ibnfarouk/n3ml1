@extends('layouts.master')
@section('page_title')
    <h1>Products</h1>
@endsection

@section('content')
    <a class="btn btn-primary mb-3" href="{{ url(route('products.create')) }}">Create Product</a>
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>Desc</th>
            <th>price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ url(route('products.show',$loop->index)) }}">
                        {{ $product['name'] }}
                    </a>
                </td>
                <td>{{ $product['desc'] }}</td>
                <td>${{ $product['price'] }}</td>
                <td>{{ $product['category'] }}</td>
                <td>
                    <a href="{{ url(route('products.edit', $loop->index)) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
