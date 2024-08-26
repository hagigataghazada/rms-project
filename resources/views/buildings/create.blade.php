<form action="{{ route('admin.buildings.store') }}" method="POST">
    @csrf
    <label for="name">Building Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="building_number">Building Number:</label>
    <input type="text" name="building_number" id="building_number" required>

    <label for="apartment_count">Apartment Count:</label>
    <input type="number" name="apartment_count" id="apartment_count" required>

    <label for="apartment_numbers">Apartment Numbers (comma-separated):</label>
    <input type="text" name="apartment_numbers" id="apartment_numbers" required>

    <button type="submit">Save Building</button>
</form>
