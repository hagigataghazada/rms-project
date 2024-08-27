
@section('content')
    <div class="container">
        <h2>Sakinler Listesi</h2>
        <a href="{{ route('residents.create') }}" class="btn btn-primary mb-3">Yeni Sakin Ekle</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>İsim</th>
                <th>Apartman</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @foreach($residents as $resident)
                <tr>
                    <td>{{ $resident->name }}</td>
                    <td>{{ optional($resident->building)->name }}</td> <!-- Building tablosundaki name alanı -->
                    <td>{{ optional($resident->apartment)->apartment_id }}</td> <!-- Apartment tablosundaki apartment_id alanı -->
                    <td>{{ $resident->email }}</td>
                    <td>{{ $resident->phone_number }}</td>
                    <td>
                        <a href="{{ route('residents.edit', $resident->id) }}" class="btn btn-warning">Düzenle</a>
                        <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
