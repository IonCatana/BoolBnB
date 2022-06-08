@extends('layouts.app')

@section('content')
    
    
    <div class="container">
        <table class="table">
            <thead class="table-dark text-center">
                <th>Sender Name</th>
                <th>Sender Email</th>
                <th>Object</th>
                <th>Date</th>
                <th>Read</th>
                <th colspan="2">Actions</th>
            </thead>

            <tbody class="text-center">
                @foreach ($messages as $msg)
                    <tr>
                        <td>{{ $msg->sender_name }}</td>
                        <td>{{ $msg->sender_email }}</td>
                        <td>{{ $msg->object }}</td>
                        <td>{{ $msg->created_at }}</td>
                        <td>
                            {{-- //TODO tasto interattivo --}}
                            @if ( !$msg->read)
                                {{ 'No' }}
                            @else
                                {{ 'Yes' }}
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('host.places.messages.show', [$place, $msg] ) }}"> See Details</a>
                        </td>
                        <td>
                            <form class="message-delete-form form-group" action="{{ route('host.places.messages.destroy', [$place, $msg]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <!-- Button trigger modal -->
                                <button type="submit" id="delete-confirm-button" class="btn btn-danger" data-toggle="modal" data-target="">Delete this message</button>
            
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('host.places.index', $place->slug) }}">Back to places</a>
    </div>
@endsection