@extends('layouts.app')

@section('content')
    {{-- button per creare nuovo place --}}
    {{-- @dd('place'); --}}
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
                <th>Statistics</th>
                
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
                            @if($place->img)
                                <img class="img-fluid" src="{{ asset('storage/' . $place->img)}}" alt="">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('host.places.edit', $place) }}" class="btn btn-warning mb-2 w-100">Edit</a>
                        
                            <form class="place-delete-form form-group mb-2" action="{{ route('host.places.destroy', $place) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <!-- Button trigger modal -->
                                <button type="submit" id="delete-confirm-button" class="btn btn-danger w-100" data-toggle="modal" data-target="">Delete</button>
            
                                <!-- Modal -->
                                <div name="delete-confirm-modal" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <button id="btn-confirm-delete" type="button" class="btn btn-danger">Yes</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @if (!$place->visible)
                                <a href="{{ route('host.places.toggleVisibility', $place) }}" class="btn btn-dark">Visibility:Off</a>
                            @else
                                <a href="{{ route('host.places.toggleVisibility', $place) }}" class="btn btn-success">Visibility:On</a>
                            @endif
                        </td>
                        <td><a href="{{ route('host.places.messages.index', $place) }}" class="btn btn-info">View Messages</a></td>
                        {{-- //TODO aggiungere tasto/link per front/show-- --}}
                        <td><a href="{{ route('host.places.visualisations.index', $place) }}" class="btn" style="background-color: #91f7c8">View Statistics</a></td>
                        
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
