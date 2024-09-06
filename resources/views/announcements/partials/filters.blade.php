<section id="filters">
    <form action="{{ route('announcements.filter') }}" method="GET">
        <div class="filter-group">
            <label for="price">Price:</label>
            <select name="price" id="price">
                <option value="low_to_high">Low to High</option>
                <option value="high_to_low">High to Low</option>
            </select>
        </div>

        <div class="filter-group">
            <label for="floor">Floor:</label>
            <select name="floor" id="floor">
                <option value="all">All Floors</option>
                <option value="1">1st Floor</option>
                <option value="2">2nd Floor</option>
                <option value="3">3rd Floor</option>
                <option value="4">4th Floor</option>
                <option value="5">5th Floor</option>
            </select>
        </div>

        <div class="filter-group">
            <label for="rooms">Rooms:</label>
            <select name="rooms" id="rooms">
                <option value="all">All Rooms</option>
                <option value="1">1 Room</option>
                <option value="2">2 Rooms</option>
                <option value="3">3 Rooms</option>
                <option value="4">4 Rooms</option>
                <option value="5">5 Rooms</option>
            </select>
        </div>

        <button type="submit">Filter</button>
    </form>
</section>
