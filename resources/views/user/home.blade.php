@extends('Layouts.UserLY.app')

@section('content')
    <h1>Apartado de inicio</h1>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>

    <p>Nombre: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
@endsection
