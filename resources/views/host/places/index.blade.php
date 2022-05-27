@extends('layouts.app')

@section('content')
    <div>ciao sono index</div>
    <ul>
      @foreach ($places as $place )
        <li>
          <div>{{$place->title}}</div>
          <div>{{ $place->id }}</div>
        </li>
      @endforeach
    </ul>
@endsection
