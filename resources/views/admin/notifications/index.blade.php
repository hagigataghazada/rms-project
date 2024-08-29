@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Gönderilen Bildirimler</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Sakin</th>
                <th>Mesaj</th>
                <th>Gönderilme Tarihi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notifications as $notification)
                <tr>
                    <td>{{ optional($notification->resident)->name }}</td>
                    <td>{{ $notification->message }}</td>
                    <td>{{ $notification->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
