@extends('layouts.master')

@section('page_title')
    <h2>Create Products</h2>
@endsection

@section('content')
    <!-- /resources/views/post/create.blade.php -->

    <h1>Create Post</h1>

    @include('partials.errors')

    <!-- Create Post Form -->
    <form action="{{ url(route('products.store')) }}" method="post">
{{--        <input type="hidden" value="{{ csrf_token() }}" name="_token">--}}
{{--        {{ csrf_field() }}--}}
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Product name">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">desc</label>
            <input name="desc" type="text" class="form-control" id="desc" placeholder="Product desc">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input name="price" type="text" class="form-control" id="price" placeholder="Product desc">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">category</label>
            <input name="category" type="text" class="form-control" id="category" placeholder="Product desc">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>

    </form>

@endsection
