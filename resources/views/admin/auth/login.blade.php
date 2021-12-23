@extends('layouts.frontend-app')

@include('layouts.navbar')
@section('content')
    <div class="container mt-4">
        @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('error') }}</p>
        @endif


        <h2>Admin Login Form</h2>
        <form action="{{route('admin.login')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
