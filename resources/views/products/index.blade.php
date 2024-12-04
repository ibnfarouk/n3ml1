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
                    <a href="{{ url(route('products.show',$product->id)) }}">
                        {{ $product->name }}
                    </a>
                </td>
                <td>{{ $product->desc }}</td>
                <td>${{ $product->price }}</td>
                <td>
                    @foreach($product->categories as $category)
                        <button class="btn btn-info m-1">{{ $category->name }}</button>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-success" href="{{ url(route('products.edit', $product->id)) }}">Edit</a>
                    <form action="{{ url(route('products.destroy', $product->id)) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $products->links() }}
@endsection
