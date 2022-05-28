@extends('layouts.app')

@section('content')
    <form action="{{ route('host.places.store') }}" method="POST" class="container px-5 justify-content md-12">
        @csrf

        {{-- titolo --}}
        <div class="form-group">
            <label for="title">Denomination</label>
            <input id="title" type="text" class="form-control @error('signs-file') is-invalid @enderror" id="title" name="title" placeholder="Enter a descriptive title" value="{{ old('title') }}">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror 
        </div>

        {{-- numero di stanze, letti, bagni e metri quadri --}}
        <div class="form-group">
            <label for="rooms">Number of rooms</label>
            <input id="rooms" type="number" class="form-control @error('signs-file') is-invalid @enderror" id="rooms" name="rooms" placeholder="Enter how many rooms the apartment has" value="{{ old('rooms') }}">
            @error('rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="beds">Number of beds</label>
            <input id="beds" type="number" class="form-control @error('signs-file') is-invalid @enderror" id="beds" name="beds" placeholder="Enter how many beds the apartment has" value="{{ old('beds') }}">
            @error('beds')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="bathrooms">Number of bathrooms</label>
            <input id="bathrooms" type="number" class="form-control" id="bathrooms" name="bathrooms" placeholder="Enter how many bathrooms the apartment has" value="{{ old('bathrooms') }}">
            @error('bathrooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="square_meters">Square meters</label>
            <input id="square_meters" type="number" class="form-control @error('signs-file') is-invalid @enderror" id="square_meters" name="square_meters" placeholder="Enter how many square meters the apartment is" value="{{ old('square_meters') }}">
            @error('square_meters')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- indirizzo --}}
        <div class="form-group">
            <label for="address">Address</label>
            <input id="address" type="text" class="form-control @error('signs-file') is-invalid @enderror" id="address" name="address" placeholder="Enter a valid address" value="{{ old('address') }}">
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- //TODO upload dell'immagine? --}}

        {{-- servizi --}}
        {{-- //TODO check  --}}
        <div class="form-group form-check form-check-inline">
            @foreach ($amenities as $i => $amenity)
                <input class="form-check-input" type="checkbox" id="amenities-{{ $i }}" value="{{ $amenity->id }}" name="amenities[{{ $i }}]" 
                {{ (is_array(old('amenities')) && in_array($amenity->id, old('amenities'))) ? ' checked' : '' }}/>
                <label class="form-check-label mr-3" for="amenities-{{ $i }}">{{ $amenity->name }}</label>
            @endforeach
        </div>

        {{-- pubblicazione --}}
        {{-- //TODO select o button? --}}
        <div class="form-group">
            <label for="visible">Select an option</label>
            <select class="form-select" aria-label="Default select example" name="visible" id="visible">
                <option selected value="">Select an option</option>
                <option value="true" {{ old('visible') ?: 'selected'}}>Yes</option>
                <option value="false" {{ !old('visible') ?: 'selected'}}>No</option>
            </select>
        </div>

        {{-- submit button --}}
        <button type="submit">Add places</button>
    </form>
@endsection