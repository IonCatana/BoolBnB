@extends('layouts.app')

@section('content')
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
                    <tr>
                        <td>{{ $msg->sender_name }}</td>
                        <td>{{ $msg->sender_email }}</td>
                        <td>
                            {{-- <a href="{{ route('host.places.messages.show', $place, $msg) }}">{{ $msg->object }}</a> --}}
                        </td>
                        <td>{{ $msg->created_at }}</td>
                        <td>{{ $msg->read }}</td>
                        {{-- <td>
                            <form class="form-group" action="{{ route('host.places.messages.destroy', $msg) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Elimina post</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection