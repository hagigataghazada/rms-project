@extends('admin.layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg" style="width: 100%; max-width: 1000px;">
            <div class="card-body">
                <h2 class="card-title text-center mb-3" style="color: #333;">Apartment List</h2>
                <a href="{{ route('apartments.create') }}" class="btn btn-primary mb-3" style="display: inline-block; padding: 10px 20px; color: white; border-radius: 5px; text-decoration: none;">Add Apartment</a>
                <table class="table table-bordered" style="background-color: #fff;">
                    <thead>
                    <tr>
                        <th>Apartment Number</th>
                        <th>Room Count</th>
                        <th>Floor Number</th>
                        <th>Status</th>
                        <th>Building Number</th>
                        <th>Price</th>
                        <th>Images</th>
                        <th>Processes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($apartments as $apartment)
                        <tr>
                            <td>{{ $apartment->apartment_number }}</td>
                            <td>{{ $apartment->room_count }}</td>
                            <td>{{ $apartment->floor_number }}</td>
                            <td>{{ $apartment->status }}</td>
                            <td>{{ $apartment->building_number }}</td>
                            <td>{{ $apartment->price }}</td>
                            <td>
                                @if($apartment->image_path)
                                    @php
                                        $images = json_decode($apartment->image_path);
                                    @endphp
                                    @foreach($images as $image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="apartment image" style="width: 30px; height: auto; margin-right: 3px;">
                                    @endforeach
                                @else
                                    No images
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn btn-warning btn-sm" style="color: white;">Edit</a>
                                <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="color: white; margin-top: 10px;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No apartments were found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
