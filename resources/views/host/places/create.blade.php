@extends('layouts.app')

@section('content')
    <div class="container px-5 md-12">
        <h1>Create place</h1>

        <form action="{{ route('host.places.store') }}" method="POST" enctype="multipart/form-data" name="place-form">
            @csrf

            {{-- place name --}}
            <div class="form-group">
                <label for="title">Denomination *</label>
                <input required id="title" type="text" class="form-control mb-3 @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter a descriptive title" value="{{ old('title') }}">

                {{-- Error --}}
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 

                {{-- indirizzo --}}
                <div class="form-group">
                    <label for="address">Address *</label>
                    {{-- click on input triggers modal --}}
                    <input required id="address" type="text" class="form-control @error('address') is-invalid @enderror" 
                    id="address" name="address" placeholder="Click to find your place's address" value="{{ old('address') }}"
                    class="btn btn-primary" data-toggle="modal" data-target="#addressModal" autocomplete="off"
                    >

                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- lat e lon: invisibili --}}
                <div class="form-group d-none">
                    <div class="row">
                        <div class="col">
                            <input id="latitude" name="lat" type="number" class="form-control" placeholder="Latitude" readonly value="{{ old('lat') }}" step="0.000001">
                        </div>
                        <div class="col">
                            <input id="longitude" name="lon" type="number" class="form-control" placeholder="Longitude" readonly value="{{ old('lon') }}" step="0.000001">
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
                                    <input list="matches" id="address-modal" type="text" class="form-control mb-2 mr-sm-2 @error('address') is-invalid @enderror"
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

            {{-- numero di stanze, letti, bagni e metri quadri --}}
            <div class="form-group">
                <label for="rooms">Number of rooms</label>
                <input id="rooms" type="number" class="form-control required_if_visible @error('rooms') is-invalid @enderror" id="rooms" name="rooms" placeholder="Enter how many rooms the apartment has" value="{{ old('rooms') }}">
                @error('rooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="beds">Number of beds</label>
                <input id="beds" type="number" class="form-control required_if_visible @error('beds') is-invalid @enderror" id="beds" name="beds" placeholder="Enter how many beds the apartment has" value="{{ old('beds') }}">
                @error('beds')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="bathrooms">Number of bathrooms</label>
                <input id="bathrooms" type="number" class="form-control required_if_visible @error('bathrooms') is-invalid @enderror" id="bathrooms" name="bathrooms" placeholder="Enter how many bathrooms the apartment has" value="{{ old('bathrooms') }}">
                @error('bathrooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="square_meters">Square meters - min: 20&#13217;</label>
                <input id="square_meters" type="number" class="form-control required_if_visible @error('square_meters') is-invalid @enderror" id="square_meters" name="square_meters" placeholder="Enter how many square meters the apartment is" value="{{ old('square_meters') }}">
                @error('square_meters')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- servizi --}}
            <label class="d-block">Amenities *</label>
            <div class="form-group">
                @foreach ($amenities as $i => $amenity)
                <div class="form-check form-check-inline col-2">
                    <input class="form-check-input validation-amenity @error('amenities[]') is-invalid @enderror" type="checkbox" id="amenities-{{ $i }}" value="{{ $amenity->id }}" name="amenities[]" {{ (is_array(old('amenities')) && in_array($amenity->id, old('amenities'))) ? ' checked' : '' }}/>

                    <label class="form-check-label" for="{{ 'amenities' . '_' . $i }}"><i class="{{ $amenity->icon }} mr-2"></i>{{ $amenity->name }}</label>

                    @error('amenities[]')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                @endforeach
            </div>

            {{-- upload dell'immagine --}}
            <label class="d-block">Load an image of your place</label>
            <div class="form-group">
                {{-- //TODO trovare il modo per cambiare la lingua in inglese, problema è che online la maggior parte dice che dipende dal browser --}}
                <input class="bg-white rounded my-2 mb-3 mr-2 required_if_visible" id="img" type="file" name="img" class="@error('img') is-invalid @enderror">
                <span>Accepted formats: jpg, jpeg, png, webp</span>
                @error('img')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- visibility --}}
            <div class="form-group form-check form-check-inline d-block">
                <input class="form-check-input" type="checkbox" id="visible-check" name="visible" 
                {{ old('visible') ? ' checked' : '' }}/>
                <label class="form-check-label mr-3" for="visible-check">Visible</label>
                <small id="visible-check-info" class="form-text text-muted d-none">
                    All fields must be filled before you submit, in order to make your place visible on the app
                </small>
            </div>

            {{-- submit button --}}
            {{-- <button id="form-submit-button" type="submit" class="btn btn-primary">Save</button> --}}

            <!-- Button trigger modal -->
            <button type="submit" id="form-submit-button" class="btn btn-primary" data-toggle="modal" data-target="">Save</button>
            
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