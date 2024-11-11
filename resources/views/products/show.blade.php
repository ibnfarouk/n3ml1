@extends('layouts.master')

@section('page_title')
    <h2>Show Product - {{ $product['name'] }}</h2>
@endsection

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{ $product['name'] }}</td>
        </tr>
        <tr>
            <th>Desc</th>
            <td>{{ $product['desc'] }}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{{ $product['price'] }}</td>
        </tr>
        <tr>
            <th>Category</th>
            <td>{{ $product['category'] }}</td>
        </tr>
    </table>

@endsection
