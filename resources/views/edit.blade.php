<div>
    <form method="POST" action='{{ route('earthquakes.update', $earthquake->id) }}' >
        @csrf
        @method('PUT')
        <div>
            <label for="magnitude">
                Magnitude:
            </label>
            <input
                type="number"
                step="0.1"
                id="magnitude"
                name="magnitude"
                placeholder='{{ $earthquake['magnitude'] }}'
                value='{{ $earthquake['magnitude'] }}'
                required
            >
        </div>
        <div>
            <label for="name">
                Name:
            </label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder='{{ $earthquake['title'] }}'
                value="{{ $earthquake['title'] }}"
                required
            >
        </div>
        <div>
            <label for="date">
                Date:
            </label>
            <input
                type="datetime-local"
                id="date"
                name="date"
                placeholder="dd/mm/yy"
                value="{{ $earthquake["magnitude"] }}"
                required
            >
        </div>
        <div>
            <label for="continent">
                Continent:
            </label>
            <select name="continent">
                <option value="">Select continent</option>
                @foreach($continents as $continent)
                    <option value="{{ $continent['id'] }}">
                        {{ $continent['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="country">
                Country:
            </label>
            <select name="country">
                <option value="">Select country</option>
                @foreach($countries as $country)
                    <option value="{{ $country['id'] }}">
                        {{ $country['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="city">
                City:
            </label>
            <select name="city">
                <option value="">Select city</option>
                @foreach($cities as $city)
                    <option value="{{ $city['id'] }}">
                        {{ $city['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="location">
                Location:
            </label>
            <select name="location">
                <option value="">Select location</option>
                @foreach($locations as $location)
                    <option value="{{ $location['id'] }}">
                        {{ $location['location'] }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">
            Update
        </button>
    </form>
</div>
