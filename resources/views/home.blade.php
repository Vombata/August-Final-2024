<div>
    <a href="{{ route('earthquakes.create') }}">Add something</a>

    <table>
        <thead>
            <tr>
                <th>
                    magnitude
                </th>
                <th>
                    title
                </th>
                <th>
                    date
                </th>
                <th>
                    continent
                </th><th>
                    country
                </th>
                <th>
                    city
                </th>
                <th>
                    location
                </th>
                <th>
                    update
                </th>
                <th>
                    delete
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allEarthquakes as $earthquake)
            <tr>
                <td>
                    {{ $earthquake['magnitude'] }}
                </td>
                <td>
                    {{ $earthquake['title'] }}
                </td>
                <td>
                    {{ $earthquake['earthquake_data']  }}
                </td>
                <td>
                    {{ $earthquake['continent_id']  }}
                </td>

                <td>
                    {{ $earthquake['city_id']  }}
                </td>
                <td>
                    {{ $earthquake['location_id']  }}
                </td>
                <td>
                    {{ $earthquake['country_id']  }}
                </td>
                <td>
                    <a href="{{ route('earthquakes.edit', $earthquake['id']) }}">
                        update
                    </a>
                </td>
                <td>
                    <form method="POST" action="{{ route('earthquakes.destroy', $earthquake['id']) }}" onsubmit="return confirm('delete this idk what?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                       trash
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
