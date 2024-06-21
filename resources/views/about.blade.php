@extends('layouts.app')

@section('title', 'À propos de nous')

@section('content')
<div class="container mx-auto p-6 px-36 justify-center">
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <h1 class="text-3xl font-bold mb-6 text-blue-700">À propos de nous</h1>
        <p class="text-gray-700 mb-6">
            Bienvenue sur notre site de gestion d'événements. Nous nous engageons à offrir le meilleur service possible pour rendre vos événements inoubliables. Notre équipe est composée de professionnels expérimentés et passionnés par l'organisation d'événements.
        </p>

        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-4 text-yellow-600">Notre mission</h2>
            <p class="text-gray-700">
                Notre mission est de faciliter l'organisation d'événements en fournissant des outils et des services de haute qualité. Nous nous efforçons de rendre chaque événement unique et mémorable.
            </p>
        </div>

        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-4 text-yellow-600">Notre équipe</h2>
            <p class="text-gray-700">
                Notre équipe se compose de professionnels talentueux de divers horizons, travaillant ensemble pour créer des événements exceptionnels. Nous croyons en la collaboration et l'innovation pour répondre aux besoins de nos clients.
            </p>
        </div>

        <div class="mb-6">
            <h2 class="text-2xl font-semibold mb-4 text-yellow-600">Nos valeurs</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li class="mb-2">Intégrité : Nous respectons les normes les plus élevées d'intégrité dans toutes nos actions.</li>
                <li class="mb-2">Orientation client : Nos clients sont au cœur de tout ce que nous faisons.</li>
                <li class="mb-2">Innovation : Nous embrassons l'innovation pour offrir des solutions créatives et efficaces.</li>
                <li class="mb-2">Travail d'équipe : Nous travaillons ensemble, au-delà des frontières, pour garantir le succès de chaque événement.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
