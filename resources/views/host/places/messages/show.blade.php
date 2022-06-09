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

        <form class="form-group m-2" action="{{ route('host.places.messages.destroy', [$message->place, $message->id]) }}"
            method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete this message</button>
            {{-- //TODO aggiungere un tasto di conferma eliminazione --}}
            {{-- //TODO aggiungere tasto "sign as read"? --}}
        </form>
    </div>
@endsection