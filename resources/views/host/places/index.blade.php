@extends('layouts.app')

@section('content')
    <div>ciao sono index</div>
    <ul>
      @foreach ($places as $place )
        <li>{{$place->title}}</li>
      @endforeach
    </ul>
@endsection
