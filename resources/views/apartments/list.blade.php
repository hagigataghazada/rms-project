<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartman Listesi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            margin: auto;
            max-width: 800px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Apartman Listesi</h2>
    <a href="{{ route('apartments.create') }}">Yeni Apartman Ekle</a>
    <table>
        <thead>
        <tr>
            <th>Apartman Numarası</th>
            <th>Oda Sayısı</th>
            <th>Kat Numarası</th>
            <th>Durum</th>
            <th>Bina Numarası</th>
            <th>Fiyat</th>
            <th>İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @foreach($apartments as $apartment)
            <tr>
                <td>{{ $apartment->apartment_id }}</td>
                <td>{{ $apartment->room_count }}</td>
                <td>{{ $apartment->floor_number }}</td>
                <td>{{ $apartment->status }}</td>
                <td>{{ $apartment->building_id }}</td>
                <td>{{ $apartment->price }}</td>
                <td>
                    <a href="{{ route('apartments.edit', $apartment->id) }}">Düzenle</a>
                    <form action="{{ route('apartments.destroy', $apartment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
