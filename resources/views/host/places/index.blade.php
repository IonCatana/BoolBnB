@extends('layouts.app')

@section('content')
{{-- button per creare nuovo place --}}
<div class="container">
  <a href="{{ route('host.places.create') }}">
    <button type="submit" class="btn btn-primary">Create new place</button>
  </a>
</div>

{{-- tabella riepilogativa dei places dell'user loggato --}}
<div class="container">
  <table>
    <thead>
      <th>Denomination</th>
      <th>Address</th>
    </thead>
    <tbody>
      @foreach ($places as $place)
        <td>{{ $place->title }}</td>
        <td>{{ $place->address }}</td>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
