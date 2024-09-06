@extends('admin.layouts.app')

@section('title', 'Create Notification')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card shadow-lg" style="width: 100%; max-width: 600px;">
            <div class="card-header text-center">
                <h3>Create Notification</h3>
            </div>
            <div class="card-body">
                <!-- Hataları göstermek için -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Bildirim oluşturma formu -->
                <form action="{{ route('admin.notifications.store') }}" method="POST">
                    @csrf

                    <!-- Userlar veya binaya gönderme seçeneği -->
                    <div class="form-group mb-3">
                        <label for="send_to">Send Notification To:</label>
                        <select id="send_to" name="send_to" class="form-control" required>
                            <option value="all">All Residents</option>
                            @foreach($buildings as $building)
                                <option value="building_{{ $building->id }}">Residents in Building {{ $building->building_number }}</option>
                            @endforeach
                            @foreach($residents as $resident)
                                <option value="resident_{{ $resident->id }}">Resident: {{ $resident->name }} ({{ $resident->email }})</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Mesaj alanı -->
                    <div class="form-group mb-3">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- Submit butonu -->
                    <button type="submit" class="btn btn-primary w-100">Send Notification</button>
                </form>
            </div>
        </div>
    </div>
@endsection
