@extends('layouts.app')

@section('content')
    {{-- button per creare nuovo place --}}
    <div class="container py-2 justify-content-end mb-4">
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
                <th>Rooms</th>
                <th>Beds</th>
                <th>Bathrooms</th>
                <th>Square Meters</th>
                <th>Amenities</th>
                <th>Image</th>
                <th>Actions</th>
                <th>Messages</th>
                
                {{-- //TODO aggiungere collegamento alla view front/show --}}
            </thead>

            <tbody class="text-center">
                @foreach ($places as $place)
                    <tr>
                        <td>{{ $place->title }}</td>
                        <td>{{ $place->address }}</td>
                        <td>{{ $place->rooms }}</td>
                        <td>{{ $place->beds }}</td>
                        <td>{{ $place->bathrooms }}</td>
                        <td>{{ $place->square_meters }}</td>
                        <td>
                            @foreach ($place->amenities as $item)
                                <i class="{{ $item->icon }}"></i>
                            @endforeach
                        </td>
                        <td>
                            <img class="img-fluid" src="{{ asset('storage/' . $place->img)}}" alt="">
                        </td>
                        <td>
                            <a href="{{ route('host.places.edit', $place) }}" class="btn btn-warning mb-2 w-100">Edit</a>
                        
                            <form class="place-delete-form form-group mb-2" action="{{ route('host.places.destroy', $place) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger w-100">Delete</button>
                            </form>

                            <form action="{{ route('host.places.update', $place) }}" name="visibility-form">
                                @csrf
                                @method('PUT')

                                <input type="checkbox" name="visible" value="{{ $place->visible }}" class="d-none visibility-check">
                                @if (!$place->visible)
                                    <button type="submit" class="visibility-toggle btn btn-dark">Visibility:Off</a>
                                @else
                                    <button type="submit" class="visibility btn btn-success">Visibility:On</a>
                                @endif
                            </form>
                        </td>
                        <td><a href="{{ route('host.places.messages.index', $place) }}" class="btn btn-info">View Messages</a></td>
                        {{-- //TODO aggiungere tasto/link per front/show-- --}}
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
