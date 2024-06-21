@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 px-4 justify-center">
    <h1 class="text-2xl font-bold mb-4">Mes Événements</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($events as $event)
        <div class="max-w-sm w-full bg-white shadow-lg rounded-lg overflow-hidden mb-6">
            <img class="w-full h-48 object-cover object-center" src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->titre }}">
            <div class="p-4">
                <h2 class="font-semibold text-lg text-gray-800 mb-2">{{ $event->titre }}</h2>
                <p class="text-gray-700 mb-2">{{ $event->description }}</p>
                <div class="flex items-center text-gray-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-.894.553L4.382 4H3a1 1 0 000 2h.117l.347 1.388A2 2 0 014 7h8a2 2 0 011.536-.662L13.883 6H15a1 1 0 100-2h-.382l-.724-1.447A1 1 0 0013 2H6zm0 2h7.236l.724 1.447a1 1 0 00.894.553H15v1H5V4h1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3 2a1 1 0 100 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}, {{ $event->heure }}</span>
                </div>
                <div class="flex items-center text-gray-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 2a1 1 0 00-1 1v1H5a1 1 0 000 2h1v1H5a1 1 0 000 2h1v1H5a1 1 0 100 2h1v1H5a1 1 0 100-2h-1V7h1a1 1 0 100-2h-1V4h1a1 1 0 100-2h-1V1a1 1 0 00-1-1H8zm1 2v1h2V4H9V3H8v1H7v2h1V6h1v1H8v2h1v1h1v1H8v1h2v1H8v1h4v-1h-1v-1h1v-1H9v-1H8V8h1V7h1V6H8V4h2zm0 6h1v1H9v-1z" />
                    </svg>
                    <span>{{ $event->lieu }}</span>
                </div>
                <div class="flex items-center text-gray-600 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v10H5V5z" />
                    </svg>
                    <span>${{ $event->prix }}</span>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('events.edit', $event->id) }}" class="text-blue-500 flex hover:text-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.293 15.293a1 1 0 001.414 1.414l10-10a1 1 0 000-1.414l-10-10a1 1 0 00-1.414 1.414L11.586 10 3.293 18.293a1 1 0 000 1.414z" clip-rule="evenodd" />
                        </svg>edit
                    </a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-600">Aucun événement n'a été trouvé.</p>
        @endforelse
    </div>
</div>
@endsection
