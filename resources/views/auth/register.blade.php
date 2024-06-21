@extends('layouts.app')

@section('title', 'register')

@section('content')
<div class="sm:mx-auto  sm:w-full sm:max-w-md">
    <img class="mx-auto h-10 w-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Workflow">
    <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
        Créer un nouveau compte
    </h2>
    <p class="mt-2 text-center text-sm leading-5 text-gray-500 max-w">
        Ou
        <a href="{{ route('login') }}" class="font-medium text-yellow-600 hover:text-yellow-500 focus:outline-none focus:underline transition ease-in-out duration-150">
            connectez-vous à votre compte
        </a>
    </p>
</div>

<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Nom</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-6">
                <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Adresse Email</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
            </div>

            <!-- Password -->
            <div class="mt-6">
                <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Mot de passe</label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-6">
                <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">Confirmer le mot de passe</label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
            </div>

            <!-- Create Account Button -->
            <div class="mt-6">
                <span class="block w-full rounded-md shadow-sm">
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:shadow-outline-indigo active:bg-yellow-700 transition duration-150 ease-in-out">
                        Créer un compte
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
@endsection
