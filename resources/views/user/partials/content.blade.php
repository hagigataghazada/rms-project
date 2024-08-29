<!-- resources/views/user/pages/home.blade.php -->
@extends('user.dashboard')

@section('content')
    <div class="container">
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p>This is your user dashboard.</p>
    </div>
@endsection
