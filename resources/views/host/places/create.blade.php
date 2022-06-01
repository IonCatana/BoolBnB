@extends('layouts.app')

@section('content')
    <form action="{{ route('host.places.store') }}" method="POST" enctype="multipart/form-data" class="container px-5 justify-content md-12" name="place-form">
        @csrf

        {{-- titolo --}}
        <div class="form-group">
            <label for="title">Denomination *</label>
            <input required id="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter a descriptive title" value="{{ old('title') }}">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror 
        </div>

        {{-- indirizzo --}}
        <div class="form-group">
            <label for="address">Address *</label>
            <input required id="address" type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Enter a valid address" value="{{ old('address') }}">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <input id="latitude" name="lat" type="number" class="coordinate form-control" placeholder="Latitude" readonly value="{{ old('lat') }}">
                </div>
                <div class="col">
                    <input id="longitude" name="lon" type="number" class="coordinate form-control" placeholder="Longitude" readonly value="{{ old('lon') }}">
                </div>
            </div>
        </div>

        {{-- numero di stanze, letti, bagni e metri quadri --}}
        <div class="form-group">
            <label for="rooms">Number of rooms</label>
            <input id="rooms" type="number" class="form-control @error('rooms') is-invalid @enderror" id="rooms" name="rooms" placeholder="Enter how many rooms the apartment has" value="{{ old('rooms') }}">
            @error('rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="beds">Number of beds</label>
            <input id="beds" type="number" class="form-control @error('beds') is-invalid @enderror" id="beds" name="beds" placeholder="Enter how many beds the apartment has" value="{{ old('beds') }}">
            @error('beds')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="bathrooms">Number of bathrooms</label>
            <input id="bathrooms" type="number" class="form-control @error('bathrooms') is-invalid @enderror" id="bathrooms" name="bathrooms" placeholder="Enter how many bathrooms the apartment has" value="{{ old('bathrooms') }}">
            @error('bathrooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="square_meters">Square meters - min: 20&#13217;</label>
            <input id="square_meters" type="number" class="form-control @error('square_meters') is-invalid @enderror" id="square_meters" name="square_meters" placeholder="Enter how many square meters the apartment is" value="{{ old('square_meters') }}">
            @error('square_meters')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- //TODO upload dell'immagine? --}}

        {{-- servizi --}}
        <label class="d-block">Amenities *</label>
        <div class="form-group form-check form-check-inline">
            @foreach ($amenities as $i => $amenity)
                <input class="form-check-input @error('amenities[]') is-invalid @enderror" type="checkbox" id="amenities-{{ $i }}" value="{{ $amenity->id }}" name="amenities[]" 
                {{ (is_array(old('amenities')) && in_array($amenity->id, old('amenities'))) ? ' checked' : '' }}/>
                <label class="form-check-label mr-3" for="{{ 'custom_check' . '_' . $i }}"><i class="{{ $amenity->icon }} mr-2"></i>{{ $amenity->name }}</label>
                @error('amenities[]')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            @endforeach
        </div>

        {{-- upload dell'immagine --}}
        <div class="form-group">
            {{-- //TODO trovare il modo per cambiare la lingua in inglese, problema è che online la maggior parte dice che dipende dal browser --}}
            <input class="bg-white rounded my-2 mb-3 mr-2" id="img" type="file" name="img" class="@error('img') is-invalid @enderror">
            <span>Accepted formats: jpg, jpeg, png, webp</span>
            @error('img')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- submit button --}}
        <button id="form-submit-button" type="submit">Add places</button>
    </form>
@endsection