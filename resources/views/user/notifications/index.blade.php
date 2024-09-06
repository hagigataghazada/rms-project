@extends('user.dashboard')

@section('title', 'Notifications')

@section('content')
    <div class="container d-flex justify-content-start align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg" style="width: 60%; background-color: #f9f9f9; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Notifications</h2>
            <div class="card-body">
                @if($notifications->isEmpty())
                    <p class="text-center" style="font-size: 1.2rem; color: #555;">There are no notifications.</p>
                @else
                    <ul class="list-group">
                        @foreach($notifications as $notification)
                            <li class="list-group-item" style="border-radius: 5px; margin-bottom: 10px; background-color: #f0f0f0; padding: 15px;">
                                <strong style="color: #007bff; font-size: 1.1rem;">
                                    {{ $notification->created_at->format('d/m/Y H:i') }}
                                </strong>
                                <p style="font-size: 1rem; color: #333; margin-top: 5px;">
                                    {{ $notification->message }}
                                </p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
