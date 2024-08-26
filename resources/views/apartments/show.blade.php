@extends('layouts.app')
@section('content')
{{--    <div class="container">--}}
{{--        <h2>{{ $apartment->name }} Apartmanı</h2>--}}
{{--        <p>Bina: {{ $apartment->building->name }}</p>--}}
{{--        <p>Kat Numarası: {{ $apartment->floor_number }}</p>--}}
{{--        <p>Oda Sayısı: {{ $apartment->room_count }}</p>--}}
{{--        <p>Durum:--}}
{{--            @if($apartment->status === 'for-sale')--}}
{{--                Satılık--}}
{{--            @elseif($apartment->status === 'for-rent')--}}
{{--                Kiralık--}}
{{--            @else--}}
{{--                Dolu--}}
{{--            @endif--}}
{{--        </p>--}}
{{--        @if($apartment->status !== 'occupied')--}}
{{--            <p>Fiyat: {{ $apartment->price }}</p>--}}
{{--        @endif--}}
{{--        <div class="carousel">--}}
{{--            @foreach(explode(',', $apartment->images) as $image)--}}
{{--                <img src="{{ asset('images/' . trim($image)) }}" alt="{{ $apartment->name }}">--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <a href="{{ route('apartments.edit', $apartment->id) }}" class="btn btn-warning">Düzenle</a>--}}
{{--        <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline;">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit" class="btn btn-danger">Sil</button>--}}
{{--        </form>--}}
{{--    </div>--}}
@endsection
