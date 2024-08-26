
@section('content')
    <h1>Resident Kayıt Formu</h1>
    <form action="{{ route('residents.create') }}" method="POST">
        @csrf
        <div>
            <label for="name">Ad:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div>
            <label for="apartment_number">Apartman Numarası:</label>
            <input type="text" id="apartment_number" name="apartment_number" required>
        </div>

        <div>
            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Şifre Onayı:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Kayıt Ol</button>
    </form>
@endsection
