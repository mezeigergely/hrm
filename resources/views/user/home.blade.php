@extends('layouts.layout')
@section('content')
    @if(Auth::check())
        @foreach ($user as $u)
            <div class="pt-3">
                <h3>No: {{ $u->id}}</h3>
                <h3>Name: {{ $u->name }}</h3>
                <h3>E-mail: {{ $u->email }}</h3>
                <h3>Position: {{ $u->position }}</h3>
            </div>
        @endforeach
        @if (count($holidays) != 0)
            <h3>My approved holidays:</h3>
            <ul>
                @foreach ($holidays as $holiday)
                    <li>{{ $holiday->h_days }}</li>
                @endforeach
            </ul>
        @endif
    @endif
@endsection
