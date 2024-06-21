<!-- resources/views/events/buy-ticket.blade.php -->
@extends('layouts.app')

@section('title', 'Confirmation d\'achat de billet')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-semibold mb-4">Confirmation d'achat de billet</h1>
            <p class="text-gray-700 mb-4">Votre achat de billet pour l'événement "{{ $event->titre }}" a été effectué avec succès.</p>
            <a href="{{ route('home') }}" class="text-blue-500 hover:underline">Retour à l'accueil</a>
        </div>
    </div>
@endsection
