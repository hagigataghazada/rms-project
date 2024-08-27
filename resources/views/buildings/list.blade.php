<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bina Listesi</title>
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
    <h2>Bina Listesi</h2>
    <a href="{{ route('buildings.create') }}">Yeni Bina Ekle</a>
    <table>
        <thead>
        <tr>
            <th>Bina Adı</th>
            <th>Apartman Sayısı</th>
            <th>Building ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach($buildings as $building)
            <tr>
                <td>{{ $building->name }}</td>
                <td>{{ $building->apartment_count }}</td>
                <td>{{ $building->building_id }}</td>
                <td>
                    <a href="{{ route('buildings.edit', $building->id) }}">Düzenle</a>
                    <form action="{{ route('buildings.destroy', $building->id) }}" method="POST" style="display:inline;">
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
