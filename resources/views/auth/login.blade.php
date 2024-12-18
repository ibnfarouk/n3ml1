@extends('layouts.master')

@section('content')

    <h2>Login</h2>
    <hr>
    @include('partials.errors')
    @include('partials.flashes')
    <form action="{{ url('login') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="text" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">PW</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Login</button>
        </div>
    </form>
@endsection
