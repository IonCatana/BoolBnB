@extends('layouts.app')

@section('content')
    <form action="{{ route('host.places.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titolo">
        </div>

        <div>
            <label for="address">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo">
        </div>

        <div>
            <label for="lat">Latitudine</label>
            <input type="number" class="form-control" id="lat" name="lat" placeholder="Latitudine">
        </div>

        <div>
            <label for="lng">Longitudine</label>
            <input type="number" class="form-control" id="lng" name="lng" placeholder="Longitudine">
        </div>

        <button type="submit">Aggiungi</button>
    </form>
@endsection