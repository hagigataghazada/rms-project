<form action="{{ route('buildings.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Bina İsmi:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="building_number">Bina Numarası:</label>
        <input type="number" name="building_number" id="building_number" required>
    </div>
    <div>
        <label for="apartment_count">Apartman Sayısı:</label>
        <input type="number" name="apartment_count" id="apartment_count" required>
    </div>
    <div>
        <label for="apartment_numbers">Apartman Numaraları (JSON format):</label>
        <textarea name="apartment_numbers" id="apartment_numbers" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
