@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Make your place visible on BoolBnb</h1>

                <h3>Make sure all fields are filled, otherwise {{ $place->title }} wont be made visible on the app</h3>

                <form method="POST" action="{{ route('host.places.update', $place) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Stanze Rooms, Beds, Bathrooms --}}
                    @if (in_array('rooms', $missing_attributes))
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
                    @endif

                    @if (in_array('beds', $missing_attributes))
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
                    @endif

                    @if (in_array('bathrooms', $missing_attributes))
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
                    @endif

                    @if (in_array('square_meters', $missing_attributes))
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
                    @endif

                    @if (in_array('img', $missing_attributes))
                    {{-- upload dell'immagine --}}
                    <div class="form-group">
                        {{-- //TODO trovare il modo per cambiare la lingua in inglese, problema è che online la maggior parte dice che dipende dal browser --}}
                        <input id="img" type="file" name="img" class="@error('img') is-invalid @enderror">
                        @error('img')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>

            </div>
        </div>
    </div>
@endsection
