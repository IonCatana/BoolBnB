@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Make your place visible on BoolBnb</h1>

                <h3>Make sure all fields are filled, otherwise {{ $place->title }} wont be made visible on the app</h3>

                <form method="POST" action="{{ route('host.places.update', $place) }}" enctype="multipart/form-data" name="place-form">
                    @csrf
                    @method('PUT')

                    {{-- arrivati a questo form siamo sicuri di volere che la place sia visible, 
                        per cui non lasciamo scelta su questa checkbox
                    --}}
                    <input type="checkbox" name="visible" class="d-none" checked>

                    Places Name
                    <div class="form-group">
                        <label for="title">Title *</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $place->title) }}" readonly>
                        {{-- Error --}}
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Address Places --}}
                    <div class="form-group">
                        <label for="address">Address *</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('title', $place->address) }}" readonly>
                        {{-- Error --}}
                        @error('address')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- invisible lon e lat --}}
                    <div class="form-group d-none">
                        <div class="row">
                            <div class="col">
                                <input id="latitude" name="lat" type="number" value="{{ $place->lat }}">
                            </div>
                            <div class="col">
                                <input id="longitude" name="lon" type="number" value="{{ $place->lon }}">
                            </div>
                        </div>
                    </div>

                    {{-- Stanze Rooms, Beds, Bathrooms --}}
                    <div class="form-group">
                        <label for="rooms">Rooms</label>
                        <input type="text" class="form-control" id="rooms" name="rooms" 
                        value="{{ old('rooms', $place->rooms) }}" 
                        required {{ !in_array('rooms', $missing_attributes) ? ' readonly' : '' }}
                        >
                        {{-- Error --}}
                        @error('rooms')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="beds">Beds</label>
                        <input type="text" class="form-control" id="beds" name="beds" 
                        value="{{ old('beds', $place->beds) }}" 
                        required {{ !in_array('beds', $missing_attributes) ? ' readonly' : '' }}
                        >
                        {{-- Error --}}
                        @error('beds')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="bathrooms">Bathrooms</label>
                        <input type="text" class="form-control" id="bathrooms" name="bathrooms" 
                        value="{{ old('bathrooms', $place->bathrooms) }}" 
                        required {{ !in_array('bathrooms', $missing_attributes) ? ' readonly' : '' }}
                        >
                        {{-- Error --}}
                        @error('bathrooms')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    {{-- Square Meters --}}
                    <div class="form-group">
                        <label for="square_meters">Square Meters</label>
                        <input type="text" class="form-control" id="square_meters" name="square_meters" 
                        value="{{ old('square_meters', $place->square_meters) }}" 
                        required {{ !in_array('square_meters', $missing_attributes) ? ' readonly' : '' }}
                        >
                        {{-- Error --}}
                        @error('square_meters')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- servizi --}}
                    {{-- // TODO sistemare le checkboxes come nella edit --}}
                    <label class="d-block">Amenities *</label>
                    <div class="form-group form-check form-check-inline">
                        @foreach ($amenities as $i => $amenity)
                            <input class="form-check-input validation-amenity @error('amenities[]') is-invalid @enderror" type="checkbox" id="amenities-{{ $i }}" value="{{ $amenity->id }}" name="amenities[]" 
                            {{ $place->amenities->contains($amenity) ? ' checked' : '' }}/>
                            <label class="form-check-label mr-3" for="{{ 'amenities-'.$i }}"><i class="{{ $amenity->icon }} mr-2"></i>{{ $amenity->name }}</label>
                            @error('amenities[]')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endforeach
                    </div>
                    
                    @if (in_array('img', $missing_attributes))
                    {{-- upload dell'immagine --}}
                    <div class="form-group">
                        <input required id="img" type="file" name="img" id="img" class="@error('img') is-invalid @enderror">
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                    
                    <button type="submit" class="btn btn-primary" id="form-submit-button">Save</button>
                </form>

            </div>
        </div>
    </div>
@endsection
