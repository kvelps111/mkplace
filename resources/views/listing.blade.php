<div class="container">
    
    
    <!-- Filter Section -->
    <form method="GET">
        <select name="region" onchange="this.form.submit()">
            <option value="">Visas reģiones</option>
            @foreach($regions as $region)
                <option value="{{ $region }}" {{ request('region') == $region ? 'selected' : '' }}>
                    {{ $region }}
                </option>
            @endforeach
        </select>
        
        <select name="school_id">
            <option value="">Visas skolas</option>
            @foreach($schools as $school)
                <option value="{{ $school->id }}" {{ request('school_id') == $school->id ? 'selected' : '' }}>
                    {{ $school->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filtrēt</button>
    </form>
    
    <!-- Listings Grid -->
    <div class="grid grid-cols-3 gap-4">
    @foreach($listings as $listing)
        <a href="{{ route('listings.show', $listing) }}" class="block border p-4 hover:shadow-lg transition-shadow">
            <h3>{{ $listing->title }}</h3>
            <p>{{ $listing->description }}</p>
            <p>{{$listing->created}}</p>
            @if ($listing->photo)
                <img src="{{ asset('storage/' . $listing->photo) }}" 
                     alt="Listing photo" 
                     style="max-width: 200px; height: auto;">
            @endif
            <p>Cena: {{ $listing->price }} €</p>
            <p>Skola: {{ $listing->school->name }}</p>
        </a>
    @endforeach
</div>
    
    {{ $listings->links() }}
</div>