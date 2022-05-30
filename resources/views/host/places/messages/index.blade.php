@extends('layouts.app')

@section('content')
    
    {{-- @dd($place); --}}

    {{-- tabella riepilogativa dei places dell'user loggato --}}
    <div class="container">
        <table class="table">
            <thead class="table-dark text-center">
                <th>Sender Name</th>
                <th>Sender Email</th>
                <th>Object</th>
                <th>Date</th>
                <th>Read</th>
                <th>Actions</th>
            </thead>

            <tbody class="text-center">
                @foreach ($messages as $msg)

                {{-- @dd($msg) --}}

                    <tr>
                        <td>{{ $msg->sender_name }}</td>
                        <td>{{ $msg->sender_email }}</td>
                        <td>{{ $msg->object }}</td>
                        <td>{{ $msg->created_at }}</td>
                        <td>
                            @if ( ($msg->read) == 0)
                                {{ 'No' }}
                            @else
                                {{ 'Yes' }}
                            @endif
                        </td>
                        <td>
                            {{-- <a class="btn btn-info" href="{{ route('host.places.messages.show', $place, $msg) }}"> Vedi messaggio</a> --}}
                        </td>
                        <td>
                            {{-- <form class="form-group" action="{{ route('host.places.messages.destroy', $msg) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete this message</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection