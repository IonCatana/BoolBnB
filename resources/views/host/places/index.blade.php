@extends('layouts.app')

@section('content')
{{-- button per creare nuovo place --}}
<div class="container py-2">
  <a href="{{ route('host.places.create') }}">
    <button type="submit" class="btn btn-primary">Create new place</button>
  </a>
</div>

{{-- tabella riepilogativa dei places dell'user loggato --}}
<div class="container">
  <table class="table">
    <thead class="table-dark">
      <th>Denomination</th>
      <th>Address</th>
      {{-- //TODO aggiungere campi per modifica, elimina, statistiche --}}
    </thead>
    <tbody>
      @foreach ($places as $place)
        <td>{{ $place->title }}</td>
        <td>{{ $place->address }}</td>
        {{-- //TODO aggiungere tasti per modifica, elimina, statistiche --}}
      @endforeach
    </tbody>
  </table>
</div>
@endsection
