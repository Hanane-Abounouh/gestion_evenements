<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'événement</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Link to FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-R7+R3uQspRRwEy7FzFq7U21w+jDTHd6PH+mBpJf+99y1kZitC3Vc/OT91gTQn3Nj/TmPggVRzvXyIs2tI6S09w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @extends('layouts.app')

    @section('title', 'Détails de l\'événement')

    @section('content')
    <div class="container mx-auto p-6 px-36">
        <div class="flex flex-col justify-center mt-12">
            <!-- Event Details Section -->
            <div class="bg-white shadow-lg rounded-2xl p-6 flex-1 mr-6">
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
                        <path d="M8 2a1 1 0 00-1 1v1H5a1 1 0 000 2h1v1H5a1 1 0 000 2h1v1H5a1 1 0 100-2h-1V7h1a1 1 0 100-2h-1V4h1a1 1 0 100-2h-1V1a1 1 0 00-1-1H8zm1 2v1h2V4H9V3H8v1H7v2h1V6h1v1H8v2h1v1h1v1H8v1h2v1H8v1h4v-1h-1v-1h1v-1H9v-1H8V8h1V7h1V6H8V4h2zm0 6h1v1H9v-1z" />
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
            </div>

            <!-- Evaluations Section -->
            <div class="bg-white shadow-lg rounded-2xl max-w-4xl mt-12 px-6">
                <h2 class="text-lg font-bold text-gray-900 mb-4">Évaluations de l'événement</h2>
                @if ($event->evaluations->isEmpty())
                    <p>Aucune évaluation pour cet événement.</p>
                @else
                    <ul>
                        @foreach ($event->evaluations as $evaluation)
                            <li class="mb-4">
                                <p class="text-gray-800 font-semibold">Note : {{ $evaluation->note }}</p>
                                <p class="text-gray-600">Commentaire : {{ $evaluation->commentaire }}</p>
                                <!-- Add more evaluation information if needed -->
                            </li>
                        @endforeach
                    </ul>
                @endif

                <!-- Evaluation Buttons -->
                <div class="mt-6">
                    <p class="text-sm text-gray-600 mb-2">Votre évaluation :</p>
                    <div>
                        <a href="{{ route('evaluations.store', ['id_event' => $event->id, 'note' => 1]) }}" class="text-yellow-500 hover:text-yellow-600">
                            <i class="fas fa-star"></i>
                        </a>
                        <a href="{{ route('evaluations.store', ['id_event' => $event->id, 'note' => 2]) }}" class="text-yellow-500 hover:text-yellow-600">
                            <i class="fas fa-star"></i>
                        </a>
                        <a href="{{ route('evaluations.store', ['id_event' => $event->id, 'note' => 3]) }}" class="text-yellow-500 hover:text-yellow-600">
                            <i class="fas fa-star"></i>
                        </a>
                        <a href="{{ route('evaluations.store', ['id_event' => $event->id, 'note' => 4]) }}" class="text-yellow-500 hover:text-yellow-600">
                            <i class="fas fa-star"></i>
                        </a>
                        <a href="{{ route('evaluations.store', ['id_event' => $event->id, 'note' => 5]) }}" class="text-yellow-500 hover:text-yellow-600">
                            <i class="fas fa-star"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="bg-white shadow-lg rounded-2xl max-w-4xl mt-12 px-6">
                @include('comments.comment_section')
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
