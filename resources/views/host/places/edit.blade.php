@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Modifica Place</h1>
                <form method="POST" action="{{ route('host.places.update', ['place' => $place->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Places Name --}}
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $place->title) }}">
                        {{-- Error --}}
                        @error('title')
                            <div class="alert alert-danger">
                                {{ message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Address Places --}}
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="{{ old('title', $place->address) }}">
                        {{-- Error --}}
                        @error('address')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Stanze Rooms, Beds, Bathrooms --}}
                    <div class="form-group">
                        <label for="rooms">Rooms</label>
                        <input type="text" class="form-control" id="rooms" name="rooms"
                            value="{{ old('rooms', $place->rooms) }}">
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
                            value="{{ old('beds', $place->beds) }}">
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
                            value="{{ old('bathrooms', $place->bathrooms) }}">
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
                            value="{{ old('square_meters', $place->square_meters) }}">
                        {{-- Error --}}
                        @error('square_meters')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    
                    {{-- Chechboxes Amenities --}}
                    {{-- //TODO da rivedere quando possiamo --}}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Servizi</label>
                            <div class="row">
                                @foreach ($amenities as $i => $amenity)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="amenities[{{ $i }}]"
                                                {{ $place->amenities->contains($amenity) ? 'checked' : '' }} value="{{ $amenity->id }}"
                                                class="custom-control-input" id="{{ 'custom_check' . '_' . $i }}">
                                                {{-- //TODO install icons dependencies --}}
                                            <label class="custom-control-label"
                                                for="{{ 'custom_check' . '_' . $i }}">{{ $amenity->name }}<i class="{{ $amenity->icon }}"></i>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- upload dell'immagine --}}
                    <div class="form-group">
                        {{-- //TODO trovare il modo per cambiare la lingua in inglese, problema è che online la maggior parte dice che dipende dal browser --}}
                        <input id="img" type="file" name="img" class="@error('img') is-invalid @enderror">
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>

            </div>
        </div>
    </div>
@endsection
