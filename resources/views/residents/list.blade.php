@extends('.admin.layouts.app')
@section('content')
    <div class="content d-flex flex-column w-90 h-80 justify-content-center">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
            <div style="width: 70% !important; background-color: #f4f4f4; padding: 20px; border-radius: 10px;" class="container">
                <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Residents List</h2>
                <a href="{{ route('residents.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; border-color: #007bff; display: inline-block; padding: 10px 20px; color: white; border-radius: 5px; text-decoration: none;">Add</a>
                <table class="table table-bordered" style="width: 100%; border-collapse: collapse; background-color: #fff; margin-top: 20px;">
                    <thead>
                    <tr>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Name</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Building Number</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Apartment Number</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Email</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Phone</th>
                        <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Processes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($residents as $resident)
                        <tr>
                            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $resident->name }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $resident->building_number }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $resident->apartment_number }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $resident->email }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $resident->phone_number }}</td>
                            <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                                <a href="{{ route('residents.edit', $resident->id) }}" class="btn btn-warning" style="background-color: #ffc107; border-color: #ffc107; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Edit</a>
                                <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">No residents were found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
