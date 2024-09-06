@extends('user.dashboard')

@section('content')
    <div class="container mt-4">
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p>This is your user dashboard.</p>
    </div>
@endsection
