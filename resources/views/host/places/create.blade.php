@extends('layouts.app')

@section('content')
    <form action="{{ route('host.places.store') }}" method="POST" class="container px-5 justify-content md-12">
        @csrf

        {{-- titolo --}}
        <div class="form-group">
            <label for="title">Denomination</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter a descriptive title">
        </div>

        {{-- numero di stanze, letti, bagni e metri quadri --}}
        <div class="form-group">
            <label for="rooms">Number of rooms</label>
            <input type="number" class="form-control" id="rooms" name="rooms" placeholder="Enter how many rooms the apartment has">
        </div>

        <div class="form-group">
            <label for="beds">Number of beds</label>
            <input type="number" class="form-control" id="beds" name="beds" placeholder="Enter how many beds the apartment has">
        </div>

        <div class="form-group">
            <label for="bathrooms">Number of bathrooms</label>
            <input type="number" class="form-control" id="bathrooms" name="bathrooms" placeholder="Enter how many bathrooms the apartment has">
        </div>

        <div class="form-group">
            <label for="square_meters">Square meters</label>
            <input type="number" class="form-control" id="square_meters" name="square_meters" placeholder="Enter how many square meters the apartment is">
        </div>

        {{-- indirizzo completo con lat e lng --}}
        {{-- //TODO implementare tomtom --}}
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo">
        </div>

        <div class="form-group">
            <label for="lat">Latitude</label>
            <input type="number" class="form-control" id="lat" name="lat" placeholder="Latitudine">
        </div>

        <div class="form-group">
            <label for="lng">Longitude</label>
            <input type="number" class="form-control" id="lng" name="lng" placeholder="Longitudine">
        </div>

        {{-- //TODO upload dell'immagine? --}}

        {{-- servizi --}}
        {{-- //TODO check  --}}
        <div class="form-group form-check form-check-inline">
            @foreach ($amenities as $amenity)
                <input class="form-check-input" type="checkbox" id="amenities-{{ $amenity->id }}" value="amenities-{{ $amenity->id }}" name="amenities[]" 
                {{ (is_array(old('amenities')) && in_array($amenity->id, old('amenities'))) ? ' checked' : '' }}/>
                <label class="form-check-label" for="amenities-{{ $amenity->id }}">{{ $amenity->name }}</label>
            @endforeach
        </div>

        {{-- pubblicazione --}}
        {{-- //TODO select o button? --}}
        <div class="form-group">
            <label for="visible">Select an option</label>
            <select class="form-select" aria-label="Default select example" name="visible" id="visible">
                <option selected value="">Select an option</option>
                <option value="true">Yes</option>
                <option value="false">No</option>
            </select>
        </div>

        {{-- submit button --}}
        <button type="submit">Add places</button>
    </form>
@endsection