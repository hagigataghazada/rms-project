
@section('content')
    <div class="container">
        <h2>Fatura Ekle</h2>
        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="apartment_id">Apartman</label>
                <select name="apartment_id" class="form-control" required>
{{--                    @foreach($apartments as $apartment)--}}
{{--                        <option value="{{ $apartment->id }}">{{ $apartment->name }}</option>--}}
{{--                    @endforeach--}}
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Tutar</label>
                <input type="number" name="amount" class="form-control" placeholder="Tutar" required>
            </div>
            <div class="form-group">
                <label for="status">Durum</label>
                <select name="status" class="form-control" required>
                    <option value="paid">Ödendi</option>
                    <option value="unpaid">Ödenmedi</option>
                    <option value="pending">Beklemede</option>
                </select>
            </div>
            <div class="form-group">
                <label for="invoice_image">Fatura Fotoğrafı</label>
                <input type="file" name="invoice_image" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Fatura Ekle</button>
        </form>
    </div>
@endsection
