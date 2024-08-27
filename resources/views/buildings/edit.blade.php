<!-- resources/views/buildings/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bina Düzenle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Bina Düzenle</h1>
    <form action="{{ route('buildings.update', $building->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Bina Adı:</label>
            <input type="text" id="name" name="name" value="{{ $building->name }}" required>
        </div>

        <div>
            <label for="building_id">Bina ID:</label>
            <input type="number" id="building_id" name="building_id" value="{{ $building->building_id }}" required>
        </div>

        <div>
            <label for="apartment_count">Apartman Sayısı:</label>
            <input type="number" id="apartment_count" name="apartment_count" value="{{ $building->apartment_count }}" required>
        </div>

        <button type="submit">Güncelle</button>
    </form>
</div>

</body>
</html>
