<h1>hello</h1>
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h2>Faturalar Listesi</h2>--}}
{{--        <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Yeni Fatura Ekle</a>--}}
{{--        <table class="table table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Apartman</th>--}}
{{--                <th>Tutar</th>--}}
{{--                <th>Durum</th>--}}
{{--                <th>Fatura Fotoğrafı</th>--}}
{{--                <th>İşlemler</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($payments as $payment)--}}
{{--                <tr>--}}
{{--                    <td>{{ $payment->apartment->name }}</td>--}}
{{--                    <td>{{ $payment->amount }}</td>--}}
{{--                    <td>--}}
{{--                        @if($payment->status === 'paid')--}}
{{--                            Ödendi--}}
{{--                        @elseif($payment->status === 'unpaid')--}}
{{--                            Ödenmedi--}}
{{--                        @else--}}
{{--                            Beklemede--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        @if($payment->invoice_image)--}}
{{--                            <img src="{{ asset('images/invoices/' . $payment->invoice_image) }}" alt="Fatura Fotoğrafı" width="100">--}}
{{--                        @else--}}
{{--                            Fotoğraf yok--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-primary">Düzenle</a>--}}
{{--                        <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--@endsection--}}
