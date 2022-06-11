@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Object: {{ $message->object }}</h1>
        <h2>Sender: {{ $message->sender_name }}</h2>
        <h3>Sender email: {{ $message->sender_email }}</h3>
        <h4>Date: {{ $message->formattedDate() }}</h4>
        <p>Content: {{ $message->content }}</p>
    </div>

    <div class="container d-flex justify-content-center">
        <a href="{{ route('host.places.messages.index', $message->place->slug) }}" class="btn btn-primary m-2">Back to messages</a>

        {{-- @dd($message->place); --}}

        <form class="message-delete-form  form-group m-2" action="{{ route('host.places.messages.destroy', [$message->place, $message->id]) }}"
            method="POST">
            @csrf
            @method('DELETE')
            
            {{-- button triggers delete modal --}}
            <button type="submit" id="delete-confirm-button" class="btn btn-danger" data-toggle="modal" data-target="">Delete this message</button>
            
            <!-- Modal delete -->
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
            {{-- //TODO aggiungere tasto "sign as read"? --}}
        </form>
    </div>
@endsection