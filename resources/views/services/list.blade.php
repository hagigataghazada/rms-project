@extends('admin.layouts.app')

@section('title', 'Servis Listesi')

@section('content')
    <div style="padding: 20px; max-width: 900px; margin: auto;">
        <h2 style="text-align: center; margin-bottom: 20px; color: #333;">Servis Listesi</h2>
        <a href="{{ route('services.create') }}" style="display: inline-block; margin-bottom: 20px; padding: 10px 15px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">Yeni Servis Ekle</a>
        <table style="width: 100%; border-collapse: collapse; background-color: #fff; border: 1px solid #ddd;">
            <thead>
            <tr>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; background-color: #f2f2f2;">Servis Adı</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; background-color: #f2f2f2;">Servis Türü</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; background-color: #f2f2f2;">İletişim Numarası</th>
                <th style="padding: 12px; text-align: left; border-bottom: 2px solid #ddd; background-color: #f2f2f2;">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @forelse($services as $service)
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $service->name }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $service->type }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #ddd;">{{ $service->contact_number }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #ddd;">
                        <a href="{{ route('services.edit', $service->id) }}" style="color: #007bff; text-decoration: none; margin-right: 10px;">Düzenle</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: white; background-color: #dc3545; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Sil</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="padding: 12px; text-align: center; border-bottom: 1px solid #ddd;">Kayıtlı servis bulunamadı.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
