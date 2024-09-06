@extends('user.dashboard')

@section('content')
    <div class="container d-flex justify-content-start align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px; background-color: #f4f4f4; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Edit Profile</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold" style="color: #555;">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required style="border-radius: 5px;">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-bold" style="color: #555;">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" style="border-radius: 5px;">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-bold" style="color: #555;">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" style="border-radius: 5px;">
                </div>

                <button type="submit" class="btn btn-primary w-100" style="border-radius: 5px; padding: 10px;">Update</button>
            </form>
        </div>
    </div>
@endsection
