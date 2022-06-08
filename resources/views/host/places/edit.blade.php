@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-danger">
                {!! session('status') !!}
            </div>
        @endif

        <form method="POST" action="{{ route('host.places.update', $place) }}" enctype="multipart/form-data" name="place-form">
        @csrf
        @method('PUT')

            {{-- Places Name --}}
            <div class="form-group">
                <label for="title">Denomination *</label>
                <input required type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $place->title) }}" >

                {{-- Error --}}
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- indirizzo --}}
            <div class="form-group">
                <label for="address">Address *</label>
                <input required type="text" class="form-control @error('title') is-invalid @enderror" id="address" name="address"
                value="{{ old('title', $place->address) }}"
                class="btn btn-primary" data-toggle="modal" data-target="#addressModal" autocomplete="off"
                >

                {{-- Error --}}
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                {{-- lat e lon display: none --}}
                <div class="form-group d-none">
                    <div class="row">
                        <div class="col">
                            <input id="latitude" name="lat" type="number" class="form-control" placeholder="Latitude" readonly value="{{ old('lat', $place->lat) }}" step="0.000001">
                        </div>
                        <div class="col">
                            <input id="longitude" name="lon" type="number" class="form-control" placeholder="Longitude" readonly value="{{ old('lon', $place->lon) }}" step="0.000001">
                        </div>
                    </div>
                </div>
        
                <!-- Modal for address-input -->
                <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" aria-labelledby="addressModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addressModalLabel">Enter your places address</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="address-modal" class="">Address</label>
                                    <input  list="matches" id="address-modal" type="text" class="form-control mb-2 mr-sm-2 @error('address') is-invalid @enderror"
                                    id="address-modal" placeholder="Enter a valid address" value="" autofocus autocomplete="off"
                                    >
                                    <div id="list-modal" class="list-group"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Stanze Rooms, Beds, Bathrooms --}}
            <div class="form-group">
                <label for="rooms">Number of rooms</label>
                <input type="text" class="form-control required_if_visible @error('title') is-invalid @enderror" id="rooms" name="rooms" value="{{ old('rooms', $place->rooms) }}">

                {{-- Error --}}
                @error('rooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="beds">Number of beds available</label>
                <input type="text" class="form-control required_if_visible @error('title') is-invalid @enderror" id="beds" name="beds" value="{{ old('beds', $place->beds) }}">

                {{-- Error --}}
                @error('beds')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bathrooms">Number of bathrooms</label>
                <input type="text" class="form-control required_if_visible @error('title') is-invalid @enderror" id="bathrooms" name="bathrooms"
                    value="{{ old('bathrooms', $place->bathrooms) }}">

                {{-- Error --}}
                @error('bathrooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- Square Meters --}}
            <div class="form-group">
                <label for="square_meters">Square Meters</label>
                <input type="text" class="form-control required_if_visible @error('title') is-invalid @enderror" id="square_meters" name="square_meters"
                    value="{{ old('square_meters', $place->square_meters) }}">

                {{-- Error --}}
                @error('square_meters')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
                        
                        
            {{-- Chechboxes Amenities --}}
            <label class="d-block">Amenities *</label>                    
            <div class="form-group">
                @foreach ($amenities as $i => $amenity)
                <div class="form-check form-check-inline col-2">
                    <input type="checkbox" name="amenities[]" {{ $place->amenities->contains($amenity) ? 'checked' : '' }} value="{{ $amenity->id }}" class="form-check-input validation-amenity @error('amenities[]') is-invalid @enderror" id="{{ 'custom_check' . '_' . $i }}">

                    {{-- //TODO install icons dependencies --}}
                    <label class="form-check-label" for="{{ 'amenities' . '_' . $i }}"><i class="{{ $amenity->icon }} mr-2"></i>{{ $amenity->name }}</label>

                    @error('amenities[]')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endforeach
            </div>

            {{-- upload dell'immagine --}}
            <div class="form-group">
                {{-- //TODO trovare il modo per cambiare la lingua in inglese, problema è che online la maggior parte dice che dipende dal browser --}}
                <input class="bg-white rounded my-2 mb-3 mr-2" id="img" type="file" name="img" class="required_if_visible @error('img') is-invalid @enderror">
                <span>Accepted formats: jpg, jpeg, png, webp</span>
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- // TODO tasto per rimuovere senza sostituire la foto --}}

            {{-- //TODO sistemare la validation cs quando visible --}}
            {{-- visibility --}}
            <label class="d-block">All fields must be filled to make your place visible on the app</label>
            <div class="form-group form-check form-check-inline d-block">
                <input class="form-check-input" type="checkbox" id="visible-check" name="visible" 
                {{ old('visible') || $place->visible ? ' checked' : '' }}/>
                <label class="form-check-label mr-3" for="visible">Visible</label>
                <small id="visible-check-info" class="form-text text-muted d-none">
                    All fields must be filled before you submit, in order to make your place visible on the app
                </small>
            </div>

            <!-- Button trigger modal -->
            <button type="submit" id="form-submit-button" class="btn btn-primary" data-toggle="modal" data-target="">Update</button>
            
            <!-- Modal -->
            <div name="validation-modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Attention!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body" id="modal-msg"></div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
@endsection