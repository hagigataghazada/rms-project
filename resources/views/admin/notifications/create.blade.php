@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Bildirim Gönder</h2>
        <form action="{{ route('admin.notifications.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="resident_id">Sakin Seç:</label>
                <select name="resident_id" id="resident_id" class="form-control">
                    @foreach($residents as $resident)
                        <option value="{{ $resident->id }}">{{ $resident->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-check mt-3">
                <input type="checkbox" class="form-check-input" id="send_to_all" name="send_to_all">
                <label class="form-check-label" for="send_to_all">Tüm sakinlere gönder</label>
            </div>

            <div class="form-group mt-3">
                <label for="message">Mesaj:</label>
                <textarea name="message" id="message" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Gönder</button>
        </form>
    </div>
@endsection
