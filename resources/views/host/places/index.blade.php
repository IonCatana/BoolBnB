@extends('layouts.app')

@section('content')
{{-- button per creare nuovo place --}}
<div class="container py-2 justify-content-end">
  <a href="{{ route('host.places.create') }}">
    <button type="submit" class="btn btn-primary">Create new place</button>
  </a>
</div>

{{-- tabella riepilogativa dei places dell'user loggato --}}
<div class="container">
  <table class="table">
    <thead class="table-dark text-center">
      <th>Denomination</th>
      <th>Address</th>
      <th>Statistics</th>
      <th>Modify</th>
      <th>Delete</th>
      {{-- //TODO aggiungere collegamento alla view front/show--}}
    </thead>
    
    <tbody>
      @foreach ($places as $place)
        <tr>
          <td>{{ $place->title }}</td>
          <td>{{ $place->address }}</td>
          <td class="text-center"><a href="{{ route('host.places.show', $place) }}" class="btn btn-info">Show statistics</a></td>
          <td class="text-center"><a href="{{ route('host.places.edit', $place) }}" class="btn btn-warning">Modify place</a></td>
          <td class="text-center">
            <form class="form-group" action="{{ route('host.places.destroy', $place) }}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger">Elimina post</button>
            </form>
          </td>
          {{-- //TODO aggiungere tasto/link per front/show-- --}}
        @endforeach
      </tr>
    </tbody>
  </table>
</div>
@endsection
