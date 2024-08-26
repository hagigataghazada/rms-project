{{--@extends('layouts.master')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h2>Servisler Listesi</h2>--}}
{{--        <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Yeni Servis Ekle</a>--}}
{{--        <table class="table table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Servis Türü</th>--}}
{{--                <th>İsim</th>--}}
{{--                <th>İletişim Numarası</th>--}}
{{--                <th>İşlemler</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($services as $service)--}}
{{--                <tr>--}}
{{--                    <td>{{ $service->service_type }}</td>--}}
{{--                    <td>{{ $service->contact_name }}</td>--}}
{{--                    <td>{{ $service->contact_phone }}</td>--}}
{{--                    <td>--}}
{{--                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Düzenle</a>--}}
{{--                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <button type="submit" class="btn btn-danger">Sil</button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--@endsection--}}
<h1>hello
</h1>
