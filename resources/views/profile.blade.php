@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <h1>Profil de l'utilisateur</h1>
    <p>Bienvenue, {{ Auth::user()->name }}!</p>
@endsection
