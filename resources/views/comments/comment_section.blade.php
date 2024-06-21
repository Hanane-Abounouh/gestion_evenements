<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Section des Commentaires -->
<section class="bg-white dark:bg-gray-900 py-8 lg:py-16 antialiased">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Commentaires</h2>
        </div>

        <!-- Formulaire de Commentaire -->
        <form method="POST" action="{{ route('comments.store') }}" class="mb-6">
            @csrf
            <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <label for="texte" class="sr-only">Votre commentaire</label>
                <textarea id="texte" name="texte" rows="6"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                    placeholder="Écrivez un commentaire..." required></textarea>
                <input type="hidden" name="id_event" value="{{ $event->id }}">
            </div>
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-yellow-700 rounded-lg focus:ring-4 focus:ring-yellow-600 dark:focus:ring-primary-900 hover:bg-yellow-800">
                Poster le commentaire
            </button>
        </form>

        <!-- Affichage des Commentaires -->
        @foreach ($event->comments as $comment)
        <article class="p-6 text-base bg-white rounded-lg max-w-2xl overflow-auto dark:bg-gray-900 mb-4">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                        {{ $comment->user->name }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        <time pubdate datetime="{{ $comment->created_at->toDateString() }}"
                            title="{{ $comment->created_at->format('F j, Y') }}">
                            {{ $comment->created_at->diffForHumans() }}
                        </time>
                    </p>
                </div>
                @auth
                    @if (auth()->user()->isAdmin() || auth()->user()->id === $comment->id_user)
                        <!-- Bouton de Suppression -->
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-red-500 bg-white rounded-lg hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-gray-50">
                                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM5.293 8.293a1 1 0 011.414 0L10 11.586l3.293-3.293a1 1 0 111.414 1.414L11.414 13l3.293 3.293a1 1 0 01-1.414 1.414L10 14.414l-3.293 3.293a1 1 0 01-1.414-1.414L8.586 13 5.293 9.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Supprimer</span>
                            </button>
                        </form>
                    @endif
                @endauth
                <!-- Dropdown de Commentaire (Optionnel) -->
                <button type="button"
                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-haspopup="true">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 16 3">
                        <path
                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                    </svg>
                    <span class="sr-only">Options du Commentaire</span>
                </button>
                <!-- Menu Déroulant (Optionnel) -->
                <div
                    class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <a href="#"
                                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Éditer</a>
                        </li>
                        <!-- Vous pouvez ajouter d'autres options ici -->
                    </ul>
                </div>
            </footer>
            <p class="text-gray-500 dark:text-gray-400">{{ $comment->texte }}</p>
        </article>
        @endforeach
    </div>
</section>

</body>
</html>
