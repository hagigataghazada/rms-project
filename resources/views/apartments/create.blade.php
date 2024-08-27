<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartman Ekle</title>
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
            width: 400px;
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
        input[type="number"],
        select {
            width: 100%;
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
    <h1>Apartman Ekle</h1>
    <form action="{{ route('apartments.store') }}" method="POST">
        @csrf
        <div>
            <label for="apartment_id">Apartman Numarası:</label>
            <input type="text" id="apartment_id" name="apartment_id" required>
        </div>

        <div>
            <label for="room_count">Oda Sayısı:</label>
            <input type="number" id="room_count" name="room_count" required>
        </div>

        <div>
            <label for="floor_number">Kat Numarası:</label>
            <input type="number" id="floor_number" name="floor_number" required>
        </div>

        <div>
            <label for="status">Durum:</label>
            <select id="status" name="status" required>
                <option value="occupied">Meşgul</option>
                <option value="for_rent">Kiralık</option>
                <option value="for_sale">Satılık</option>
                <option value="repair">Tamirde</option>
            </select>
        </div>

        <div>
            <label for="price">Fiyat:</label>
            <input type="number" id="price" name="price" step="0.01">
        </div>

        <div>
            <label for="building_id">Bina Numarası:</label>
            <input type="number" id="building_id" name="building_id" required>
        </div>

        <button type="submit">Apartman Ekle</button>
    </form>
</div>

</body>
</html>
