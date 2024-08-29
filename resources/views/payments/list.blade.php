@extends('admin.layouts.app')

@section('title', 'Fatura Listesi')

@section('content')
    <div class="content d-flex flex-column w-100 h-100 m-auto align-items-center">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="content" style="width: 80%; background-color: #f4f4f4; padding: 20px; border-radius: 10px;">
                <h2 class="text-center mb-4" style="color: #333;">Fatura Listesi</h2>
                <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3" style="display: inline-block; padding: 10px 20px; color: white; border-radius: 5px; text-decoration: none;">Yeni Fatura Ekle</a>
                <table class="table table-bordered" style="background-color: #fff;">
                    <thead>
                    <tr>
                        <th style="padding: 12px; text-align: left;">Kullanıcı</th>
                        <th style="padding: 12px; text-align: left;">Apartman</th>
                        <th style="padding: 12px; text-align: left;">Fatura Türü</th>
                        <th style="padding: 12px; text-align: left;">Tutar</th>
                        <th style="padding: 12px; text-align: left;">Durum</th>
                        <th style="padding: 12px; text-align: left;">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td style="padding: 12px;">{{ optional($payment->user)->name }}</td>
                            <td style="padding: 12px;">{{ optional($payment->apartment)->apartment_id }}</td>
                            <td style="padding: 12px;">
                                @if($payment->type == 'water')
                                    Su
                                @elseif($payment->type == 'gas')
                                    Gaz
                                @elseif($payment->type == 'electricity')
                                    Elektrik
                                @elseif($payment->type == 'elevator')
                                    Asansör
                                @endif
                            </td>
                            <td style="padding: 12px;">{{ number_format($payment->amount, 2) }} ₺</td>
                            <td style="padding: 12px;">
                                @if($payment->status == 'paid')
                                    <span class="text-success">Ödendi</span>
                                @elseif($payment->status == 'unpaid')
                                    <span class="text-danger">Ödenmedi</span>
                                @elseif($payment->status == 'pending')
                                    <span class="text-warning">Beklemede</span>
                                @endif
                            </td>
                            <td style="padding: 12px;">
                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-warning" style="padding: 5px 10px; border-radius: 5px;">Düzenle</a>
                                <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding: 5px 10px; border-radius: 5px;">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 12px; text-align: center;">Hiçbir fatura bulunamadı.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
