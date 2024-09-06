@extends('.admin.layouts.app')
@section('content')
    <div class="d-flex justify-content-center" style="width: 100%; height: 90vh;">
        <div class="d-flex flex-column align-content-center align-items-center" style="width: 90% !important; margin-left:auto !important; background-color: #f4f4f4; padding: 20px; border-radius: 10px;" class="container">
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Apartment List</h2>
            <a href="{{ route('apartments.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; border-color: #007bff; display: inline-block; padding: 10px 20px; color: white; border-radius: 5px; text-decoration: none;">Add</a>
            <table class="table table-bordered" style="width: 80%; border-collapse: collapse; background-color: #fff; margin-top: 20px;">
                <thead>
                <tr>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Apartman Number</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Room Count</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Floor Number</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Status</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Building Number</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Price</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Processes</th>
                </tr>
                </thead>
                <tbody>
                @forelse($apartments as $apartment)
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->apartment_number }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->room_count }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->floor_number }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->status }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->building_number }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->price }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn btn-warning" style="background-color: #ffc107; border-color: #ffc107; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Edit</a>
                            <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">No apartments were found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
