
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
{{--            @foreach($residents as $resident)--}}
{{--                <tr>--}}
{{--                    <td>{{ $resident->name }} {{ $resident->surname }}</td>--}}
{{--                    <td>{{ $resident->apartment->name }}</td>--}}
{{--                    <td>{{ $resident->email }}</td>--}}
{{--                    <td>{{ $resident->phone }}</td>--}}
{{--                    <td>--}}
{{--                        <a href="{{ route('residents.edit', $resident->id) }}" class="btn btn-warning">Düzenle</a>--}}
{{--                        <form action="{{ route('residents.destroy', $resident->id) }}" method="POST" style="display:inline;">--}}
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
