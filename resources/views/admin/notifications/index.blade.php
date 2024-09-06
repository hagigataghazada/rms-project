@extends('admin.layouts.app')

@section('title', 'Notification List')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg" style="width: 100%; max-width: 900px;">
            <div class="card-header text-center">
                <h3>Notification List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>Sent By (Admin)</th>
                        <th>Sent To (Resident)</th>
                        <th>Message</th>
                        <th>Date Sent</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($notifications as $notification)
                        <tr>
                            <td>{{ optional($notification->admin)->name }}</td>
                            <td>
                                @if($notification->user)
                                    {{ optional($notification->user)->name }} (Building: {{ optional($notification->user)->building_number }}, Apartment: {{ optional($notification->user)->apartment_number }})
                                @else
                                    All Residents
                                @endif
                            </td>
                            <td>{{ $notification->message }}</td>
                            <td>{{ $notification->created_at->format('d-m-Y H:i:s') }}</td>
                            <td>
                                <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No notifications found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $notifications->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
