@section('content')
    <div class="container">
        <h2>Apartmanlar Listesi</h2>
        <a href="{{ route('apartments.create') }}" class="btn btn-primary mb-3">Yeni Apartman Ekle</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Apartman Adı</th>
                <th>Bina</th>
                <th>Kat Numarası</th>
                <th>Oda Sayısı</th>
                <th>Durum</th>
                <th>Fiyat</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
{{--            @foreach($apartments as $apartment)--}}
{{--                <tr>--}}
{{--                    <td>{{ $apartment->name }}</td>--}}
{{--                    <td>{{ $apartment->building->name }}</td>--}}
{{--                    <td>{{ $apartment->floor_number }}</td>--}}
{{--                    <td>{{ $apartment->room_count }}</td>--}}
{{--                    <td>--}}
{{--                        @if($apartment->status === 'for-sale')--}}
{{--                            Satılık--}}
{{--                        @elseif($apartment->status === 'for-rent')--}}
{{--                            Kiralık--}}
{{--                        @else--}}
{{--                            Dolu--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>{{ $apartment->status !== 'occupied' ? $apartment->price : '-' }}</td>--}}
{{--                    <td>--}}
{{--                        <a href="{{ route('apartments.show', $apartment->id) }}" class="btn btn-info">Görüntüle</a>--}}
{{--                        <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn btn-warning">Düzenle</a>--}}
{{--                        <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline;">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger">Sil</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
            </tbody>
        </table>
    </div>
@endsection
