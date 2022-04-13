@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Zalogowano jako {{auth()->user()->name}}</h1>
        <p class="lead">Witaj w systemie!</p>
        @endauth

        @guest
        <h1>Witaj Gościu!</h1>
        <p class="lead">Zaloguj się do systemu.</p>
        @endguest
    </div>
@endsection