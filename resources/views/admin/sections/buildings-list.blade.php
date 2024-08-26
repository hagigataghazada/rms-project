<div class="card-container">
    @foreach($buildings as $building)
        <div class="card">
            <h3>{{ $building->name }}</h3>
            <p>Bina Numarası: {{ $building->building_number }}</p>
            <p>Apartman Sayısı: {{ $building->apartment_count }}</p>
            <p>Apartman Numaraları: {{ implode(', ', json_decode($building->apartment_numbers)) }}</p>
            <div class="card-actions">
                <a href="{{ route('buildings.edit', $building->id) }}" class="btn btn-success">Edit</a>
                <form action="{{ route('buildings.destroy', $building->id) }}" method="POST" onsubmit="return confirm('Bu binayı silmek istediğinizden emin misiniz?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
