<form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Apartman Adı</label>
        <input type="text" name="name" class="form-control" placeholder="Apartman Adı" required>
    </div>
    <div class="form-group">
        <label for="building_id">Bina</label>
        <select name="building_id" class="form-control" required>
{{--            @foreach($buildings as $building)--}}
{{--                <option value="{{ $building->id }}">{{ $building->name }}</option>--}}
{{--            @endforeach--}}
        </select>
    </div>
    <div class="form-group">
        <label for="floor_number">Kat Numarası</label>
        <input type="number" name="floor_number" class="form-control" placeholder="Kat Numarası" required>
    </div>
    <div class="form-group">
        <label for="room_count">Oda Sayısı</label>
        <input type="number" name="room_count" class="form-control" placeholder="Oda Sayısı" required>
    </div>
    <div class="form-group">
        <label for="status">Durum</label>
        <select name="status" class="form-control" required>
            <option value="occupied">Dolu</option>
            <option value="for-sale">Satılık</option>
            <option value="for-rent">Kiralık</option>
        </select>
    </div>
    <div class="form-group">
        <label for="price">Fiyat (Satılık veya Kiralık ise)</label>
        <input type="number" name="price" class="form-control" placeholder="Fiyat">
    </div>
    <div class="form-group">
        <label for="images">Fotoğraflar</label>
        <input type="file" name="images[]" class="form-control" multiple>
    </div>
    <button type="submit" class="btn btn-primary">Apartman Ekle</button>
</form>
