
@section('content')
    <div class="container">
        <h2>Servis Ekle</h2>
        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="service_type">Servis Türü</label>
                <input type="text" name="service_type" class="form-control" placeholder="Servis Türü" required>
            </div>
            <div class="form-group">
                <label for="contact_name">İsim</label>
                <input type="text" name="contact_name" class="form-control" placeholder="İsim" required>
            </div>
            <div class="form-group">
                <label for="contact_phone">İletişim Numarası</label>
                <input type="text" name="contact_phone" class="form-control" placeholder="İletişim Numarası" required>
            </div>
            <button type="submit" class="btn btn-primary">Servis Ekle</button>
        </form>
    </div>
@endsection
