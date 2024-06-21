<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@extends('layouts.app')

@section('title', 'Détails de l\'événement')

@section('content')
<div class="container mx-auto p-6 px-36 justify-center">
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <div class="relative h-96 w-full mb-6">
        <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="w-full h-full object-cover rounded-xl">
            <div class="absolute top-2 left-2 bg-white p-2 rounded-br-xl">
                <div class="text-center">
                    <div class="text-lg font-bold">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</div>
                    <div class="text-sm text-yellow-600">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</div>
                </div>
            </div>
        </div>

        <h1 class="text-3xl font-bold text-blue-600 mb-4">{{ $event->titre }}</h1>

        <div class="flex items-center text-gray-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-.894.553L4.382 4H3a1 1 0 000 2h.117l.347 1.388A2 2 0 014 7h8a2 2 0 011.536-.662L13.883 6H15a1 1 0 100-2h-.382l-.724-1.447A1 1 0 0013 2H6zm0 2h7.236l.724 1.447a1 1 0 00.894.553H15v1H5V4h1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3 2a1 1 0 100 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
            </svg>
            <span>{{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}, {{ $event->heure }}</span>
        </div>

        <div class="flex items-center text-gray-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M8 2a1 1 0 00-1 1v1H5a1 1 0 000 2h1v1H5a1 1 0 000 2h1v1H5a1 1 0 100 2h1v1H5a1 1 0 100-2h-1V7h1a1 1 0 100-2h-1V4h1a1 1 0 100-2h-1V1a1 1 0 00-1-1H8zm1 2v1h2V4H9V3H8v1H7v2h1V6h1v1H8v2h1v1h1v1H8v1h2v1H8v1h4v-1h-1v-1h1v-1H9v-1H8V8h1V7h1V6H8V4h2zm0 6h1v1H9v-1z" />
            </svg>
            <span>{{ $event->lieu }}</span>
        </div>

        <div class="flex items-center text-gray-600 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v10H5V5z" />
            </svg>
            <span>Par {{ $event->user->name }}</span>
        </div>

        <div class="text-xl font-semibold text-gray-900 mb-4">${{ $event->prix }}</div>

        <p class="text-gray-700 mb-6">
            {{ $event->description }}
        </p>

        <div class="flex space-x-2 text-sm font-medium justify-start mb-6">
            <a href="#" class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-blue-600 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-blue-600">
                <span>Commenter</span>
            </a>
            <div class="flex items-center space-x-1 text-yellow-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 00-.97.757l-2.6 8.537-7.4.368a1 1 0 00-.55 1.79l6 4.664L4.537 19.97a1 1 0 001.524-1.054L6.82 15.62l6.72-5.243 3.096 2.28a1 1 0 101.32-1.497l-3.5-2.576.877-2.875a1 1 0 00-.97-1.325z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 00-.97.757l-2.6 8.537-7.4.368a1 1 0 00-.55 1.79l6 4.664L4.537 19.97a1 1 0 001.524-1.054L6.82 15.62l6.72-5.243 3.096 2.28a1 1 0 101.32-1.497l-3.5-2.576.877-2.875a1 1 0 00-.97-1.325z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 00-.97.757l-2.6 8.537-7.4.368a1 1 0 00-.55 1.79l6 4.664L4.537 19.97a1 1 0 001.524-1.054L6.82 15.62l6.72-5.243 3.096 2.28a1 1 0 101.32-1.497l-3.5-2.576.877-2.875a1 1 0 00-.97-1.325z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 00-.97.757l-2.6 8.537-7.4.368a1 1 0 00-.55 1.79l6 4.664L4.537 19.97a1 1 0 001.524-1.054L6.82 15.62l6.72-5.243 3.096 2.28a1 1 0 101.32-1.497l-3.5-2.576.877-2.875a1 1 0 00-.97-1.325z" clip-rule="evenodd" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 00-.97.757l-2.6 8.537-7.4.368a1 1 0 00-.55 1.79l6 4.664L4.537 19.97a1 1 0 001.524-1.054L6.82 15.62l6.72-5.243 3.096 2.28a1 1 0 101.32-1.497l-3.5-2.576.877-2.875a1 1 0 00-.97-1.325z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>