@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="container mx-auto p-6 px-4 justify-center">
    @if(session('success'))
    <div class="bg-yellow-600 border text-white border-yellow-400  px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
            <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Fermer</title>
                <path d="M14.35 5.65a.5.5 0 0 1 0 .7l-4 4a.5.5 0 0 1-.7 0l-4-4a.5.5 0 0 1 .7-.7L10 9.29l3.65-3.64a.5.5 0 0 1 .7 0z"/>
            </svg>
        </span>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Erreur!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Fermer</title>
                <path d="M14.35 5.65a.5.5 0 0 1 0 .7l-4 4a.5.5 0 0 1-.7 0l-4-4a.5.5 0 0 1 .7-.7L10 9.29l3.65-3.64a.5.5 0 0 1 .7 0z"/>
            </svg>
        </span>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @forelse ($events as $event)
        <div class="max-w-sm w-full bg-white shadow-lg rounded-2xl p-6">
            <div class="flex flex-col">
                <div class="relative h-48 w-full mb-3 mt-2 mr-2">
                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="w-full h-full object-cover rounded-xl">

                    <div class="absolute top-2 left-2 bg-white p-2 px-4 rounded-br-xl">
                        <div class="text-center">
                            <div class="text-lg font-bold">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</div>
                            <div class="text-sm font-bold text-yellow-600">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</div>
                        </div>
                    </div>
                </div>
                <div class="flex-auto justify-evenly">
                    <h2 class="text-lg font-semibold text-gray-900 mb-2">{{ $event->titre }}</h2>
                    <p class="text-gray-700 mb-4">{{ $event->description }}</p>
                    <div class="flex items-center text-gray-600 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-.894.553L4.382 4H3a1 1 0 000 2h.117l.347 1.388A2 2 0 014 7h8a2 2 0 011.536-.662L13.883 6H15a1 1 0 100-2h-.382l-.724-1.447A1 1 0 0013 2H6zm0 2h7.236l.724 1.447a1 1 0 00.894.553H15v1H5V4h1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3 2a1 1 0 100 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}, {{ $event->heure }}</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M8 2a1 1 0 00-1 1v1H5a1 1 0 000 2h1v1H5a1 1 0 000 2h1v1H5a1 1 0 100 2h1v1H5a1 1 0 100 2h1v1H5a1 1 0 100-2h-1v-1h1a1 1 0 100-2h-1V7h1a1 1 0 100-2h-1V4h1a1 1 0 100-2h-1V1a1 1 0 00-1-1H8zm1 2v1h2V4H9V3H8v1H7v2h1V6h1v1H8v2h1v1h1v1H8v1h2v1H8v1h4v-1h-1v-1h1v-1H9v-1H8V8h1V7h1V6H8V4h2zm0 6h1v1H9v-1z" />
                        </svg>
                        <span>{{ $event->lieu }}</span>
                    </div>
                    <div class="flex items-center text-gray-600 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v10H5V5z" />
                        </svg>
                        <span>Par {{ $event->user->name }}</span>
                    </div>
                    <div class="text-xl font-semibold text-gray-900 mb-2">${{ $event->prix }}</div>
                    <div class="flex space-x-2 text-sm font-medium justify-start">
                        <a href="{{ route('events.show', $event->id) }}" class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-yellow-600 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-yellow-600">
                            <span>Voir Détails</span>
                        </a>

                        @auth
                            @php
                                $hasTicket = $event->inscriptions()->where('id_user', auth()->user()->id)->exists();
                            @endphp

                            @if($hasTicket)
                                <form action="{{ route('events.delete-ticket', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-5 py-2 rounded-full hover:bg-red-700">Supprimer ce billet</button>
                                </form>
                            @else
                                <form action="{{ route('events.buy-ticket', $event->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700">Acheter un billet</button>
                                </form>
                            @endif
                        @else
                            <button type="button" class="bg-green-600 text-white px-5 py-2 rounded-full hover:bg-green-700" onclick="window.location='{{ route('register') }}'">Acheter un billet</button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @empty
        <p>Aucun événement n'a été trouvé.</p>
        @endforelse
    </div>
</div>
@endsection
