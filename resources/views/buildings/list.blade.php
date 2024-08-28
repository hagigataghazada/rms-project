@extends('admin.layouts.app')

@section('title', 'Bina Listesi')

@section('content')
    <div class="" style="width: 100%;">
        <div style="width: 80% !important; margin-left:auto !important; background-color: #f4f4f4; padding: 20px; border-radius: 10px;" class="container">
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Bina Listesi</h2>
            <a href="{{ route('buildings.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; border-color: #007bff; display: inline-block; padding: 10px 20px; color: white; border-radius: 5px; text-decoration: none;">Yeni Bina Ekle</a>
            <table class="table table-bordered" style="width: 100%; border-collapse: collapse; background-color: #fff; margin-top: 20px;">
                <thead>
                <tr>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Bina Adı</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Apartman Sayısı</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Building ID</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($buildings as $building)
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $building->name }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $building->apartment_count }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $building->building_id }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-warning" style="background-color: #ffc107; border-color: #ffc107; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; margin-right: 10px;">Düzenle</a>
                            <form action="{{ route('buildings.destroy', $building->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Sil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
