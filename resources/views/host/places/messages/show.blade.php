@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Object: {{ $message->object }}</h1>
        <h2>Sender: {{ $message->sender_name }}</h2>
        <h3>Sender email: {{ $message->sender_email }}</h3>
        <p>Content: {{ $message->content }}</p>
    </div>
@endsection