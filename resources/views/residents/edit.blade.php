<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Düzenle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1>Resident Düzenle</h1>
    <form action="{{ route('residents.update', $resident->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Ad:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $resident->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $resident->email }}" required>
        </div>

        <div class="form-group">
            <label for="apartment_number">Apartman Numarası:</label>
            <input type="text" id="apartment_number" name="apartment_number" class="form-control" value="{{ $resident->apartment_number }}" required>
        </div>

        <div class="form-group">
            <label for="password">Şifre (Değiştirmek istemiyorsanız boş bırakın):</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Şifre Onayı:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>

</body>
</html>
