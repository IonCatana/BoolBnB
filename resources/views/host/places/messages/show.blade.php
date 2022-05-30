@extends('layouts.app')

@section('content')
    <div class="container">
        here the text of the message {{ $msg->content }}
    </div>
@endsection