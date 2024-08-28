@extends('.admin.layouts.app')
@section('content')
    <div class="" style="width: 100%;">
        <div style="width: 80% !important; margin-left:auto !important; background-color: #f4f4f4; padding: 20px; border-radius: 10px;" class="container">
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Apartman Listesi</h2>
            <a href="{{ route('apartments.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; border-color: #007bff; display: inline-block; padding: 10px 20px; color: white; border-radius: 5px; text-decoration: none;">Yeni Apartman Ekle</a>
            <table class="table table-bordered" style="width: 100%; border-collapse: collapse; background-color: #fff; margin-top: 20px;">
                <thead>
                <tr>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Apartman Numarası</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Oda Sayısı</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Kat Numarası</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Durum</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Bina Numarası</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Fiyat</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @forelse($apartments as $apartment)
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->apartment_id }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->room_count }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->floor_number }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->status }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->building_id }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $apartment->price }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn btn-warning" style="background-color: #ffc107; border-color: #ffc107; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Düzenle</a>
                            <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Hiçbir apartman bulunamadı.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
