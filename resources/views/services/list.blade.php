@extends('.admin.layouts.app')

@section('content')
    <div class="content" style="background-color: #ffffff;"> <!-- content sınıfını ekledik -->
        <div class="container" style="width: 80%; margin-left:auto !important; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
            <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Servis Listesi</h2>
            <a href="{{ route('services.create') }}" class="btn btn-primary mb-3" style="background-color: #007bff; border-color: #007bff; display: inline-block; padding: 10px 20px; color: white; border-radius: 5px; text-decoration: none;">Yeni Servis Ekle</a>
            <table class="table table-bordered" style="width: 100%; border-collapse: collapse; background-color: #fff; margin-top: 20px;">
                <thead>
                <tr>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Servis Adı</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">Servis Türü</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">İletişim Numarası</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @forelse($services as $service)
                    <tr>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $service->name }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $service->type }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $service->contact_number }}</td>
                        <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning" style="background-color: #ffc107; border-color: #ffc107; color: white; padding: 5px 10px; border-radius: 5px;">Düzenle</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="background-color: #dc3545; border-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Hiçbir servis bulunamadı.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
