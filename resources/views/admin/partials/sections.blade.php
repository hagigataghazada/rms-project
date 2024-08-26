{{--<div class="dashboard-sections content">--}}
{{--    <!-- Binalar Section -->--}}
{{--    <div class="dashboard-section" id="buildings">--}}
{{--        <h2>Binalar</h2>--}}
{{--        <button class="btn-primary" onclick="showBuildingForm()">Bina Ekle</button>--}}
{{--        <div id="building-list" class="card-container">--}}
{{--            <!-- Eklenen binalar burada listelenecek -->--}}
{{--            @foreach($buildings as $building)--}}
{{--                <div class="card">--}}
{{--                    <h3>{{ $building->name }}</h3>--}}
{{--                    <p>Bina Numarası: {{ $building->building_number }}</p>--}}
{{--                    <p>Apartman Sayısı: {{ $building->apartment_count }}</p>--}}
{{--                    <p>Apartman Numaraları: {{ implode(', ', json_decode($building->apartment_numbers)) }}</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Bina Ekleme Formu (Modal) -->--}}
{{--    <form action="{{ route('buildings.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        <input type="text" name="name" placeholder="Building Name">--}}
{{--        <input type="file" name="photo">--}}
{{--        <input type="number" name="building_number" placeholder="Building Number">--}}
{{--        <input type="number" name="apartment_count" placeholder="Apartment Count">--}}
{{--        <textarea name="apartment_numbers" placeholder="Apartment Numbers (JSON format)"></textarea>--}}
{{--        <button type="submit">Add Building</button>--}}
{{--    </form>--}}

{{--    <!-- Apartments Section -->--}}
{{--    <div class="dashboard-section" id="apartments">--}}
{{--        <h2>Apartmanlar</h2>--}}
{{--        <button class="btn-primary" onclick="showForm('add-apartment')">Apartman Ekle</button>--}}
{{--        <div id="apartment-list" class="card-container">--}}
{{--            @foreach($apartments as $apartment)--}}
{{--                <div class="card">--}}
{{--                    <h3>{{ $apartment->name }}</h3>--}}
{{--                    <p>Status: {{ $apartment->status }}</p>--}}
{{--                    @if($apartment->status === 'for-sale' || $apartment->status === 'for-rent')--}}
{{--                        <p>Fiyat: {{ $apartment->price }}</p>--}}
{{--                    @endif--}}
{{--                    <div class="carousel">--}}
{{--                        @foreach(explode(',', $apartment->images) as $image)--}}
{{--                            <img src="{{ asset('images/' . trim($image)) }}" alt="{{ $apartment->name }}">--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                    <div class="card-actions">--}}
{{--                        <button>Edit</button>--}}
{{--                        <button>Delete</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Residents Section -->--}}
{{--    <div class="dashboard-section" id="residents">--}}
{{--        <h2>Sakinler</h2>--}}
{{--        <button class="btn-primary" onclick="showForm('add-resident')">Sakin Ekle</button>--}}
{{--        <div id="resident-list" class="card-container">--}}
{{--            @foreach($residents as $resident)--}}
{{--                <div class="card">--}}
{{--                    <img src="{{ asset('images/' . $resident->photo) }}" alt="{{ $resident->name }}">--}}
{{--                    <h3>{{ $resident->name }} {{ $resident->surname }}</h3>--}}
{{--                    <p>Apartman: {{ $resident->apartment->name }}</p>--}}
{{--                    <p>Email: {{ $resident->email }}</p>--}}
{{--                    <p>Telefon: {{ $resident->phone }}</p>--}}
{{--                    <div class="card-actions">--}}
{{--                        <button>Edit</button>--}}
{{--                        <button>Delete</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <!-- Yeni Eklenen Satılık Section -->--}}
{{--    <div class="dashboard-section" id="for-sale">--}}
{{--        <h2>Satılık</h2>--}}
{{--        <button class="btn-primary" onclick="showForm('add-sale')">Satılık Menzil Ekle</button>--}}
{{--    </div>--}}

{{--    <!-- Yeni Eklenen Kiralık Section -->--}}
{{--    <div class="dashboard-section" id="for-rent">--}}
{{--        <h2>Kiralık</h2>--}}
{{--        <button class="btn-primary" onclick="showForm('add-rent')">Kiralık Menzil Ekle</button>--}}
{{--    </div>--}}

{{--    <!-- Requests Section -->--}}
{{--    <div class="dashboard-section" id="requests">--}}
{{--        <h2>Requestler</h2>--}}
{{--                <div id="request-list" class="card-container">--}}
{{--                    @foreach($requests as $request)--}}
{{--                        <div class="card">--}}
{{--                            <h3>{{ $request->resident->name }} {{ $request->resident->surname }}</h3>--}}
{{--                            <p>{{ $request->description }}</p>--}}
{{--                            <p>Status: {{ $request->status }}</p>--}}
{{--                            <div class="card-actions">--}}
{{--                                <button>Status Değiştir</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--    </div>--}}
{{--</div>--}}
