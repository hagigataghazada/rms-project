@extends('admin.layouts.app')

@section('title', 'Bina Listesi')

@section('content')
    <div class="container d-flex justify-content-end align-items-center" style="min-height: 80vh;">
        <div class="card shadow-lg w-100" style="max-width: 80%; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 class="text-center mb-4" style="color: #333;">Bina Listesi</h2>
            <a href="{{ route('buildings.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; border-color: #007bff; color: white; border-radius: 5px; text-decoration: none;">Yeni Bina Ekle</a>
            <table class="table table-bordered bg-white">
                <thead class="thead-light">
                <tr>
                    <th class="text-center" style="padding: 12px; border-bottom: 2px solid #ddd;">Bina Adı</th>
                    <th class="text-center" style="padding: 12px; border-bottom: 2px solid #ddd;">Apartman Sayısı</th>
                    <th class="text-center" style="padding: 12px; border-bottom: 2px solid #ddd;">Building ID</th>
                    <th class="text-center" style="padding: 12px; border-bottom: 2px solid #ddd;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($buildings as $building)
                    <tr>
                        <td class="text-center" style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $building->name }}</td>
                        <td class="text-center" style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $building->apartment_count }}</td>
                        <td class="text-center" style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $building->building_id }}</td>
                        <td class="text-center" style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-warning" style="color: white; border-radius: 5px; margin-right: 5px;">Düzenle</a>
                            <form action="{{ route('buildings.destroy', $building->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="border-radius: 5px; cursor: pointer;">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
