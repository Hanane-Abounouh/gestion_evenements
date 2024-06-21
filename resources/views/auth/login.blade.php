@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="relative py-4 sm:max-w-xl sm:mx-auto ">
    <div class="absolute inset-0 bg-gradient-to-r from-yellow-600 to-yellow-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-2xl"></div>
    <div class="relative px-6 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
        <div class="max-w-lg mx-auto">
            <div>
                <h1 class="text-3xl font-semibold text-center mb-6">Login</h1>
            </div>
            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="text-gray-800 text-sm mb-2 block">Adresse Email</label>
                    <div class="relative">
                        <input id="email" name="email" type="email" value="{{ old('email') }}" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-rose-600" placeholder="Entrez votre adresse email" required>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="text-gray-800 text-sm mb-2 block">Mot de passe</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-rose-600" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mt-4">
                    <input id="remember_me" name="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>

                <div class="flex items-center justify-end mt-4 gap-10">
                    <!-- Forgot Password -->
                    <div class="text-right mt-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-gray-600 hover:text-gray-900">Mot de passe oublié ?</a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div class="mt-6">
                        <button type="submit" class="bg-yellow-500 text-white rounded-md px-4 py-2 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">Connexion</button>
                    </div>
                </div>

                <!-- Register Link -->
                <p class="text-sm mt-10 text-center text-gray-800">Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="text-yellow-400 font-semibold hover:underline ml-1">Inscrivez-vous ici</a></p>
            </form>
        </div>
    </div>
</div>
@endsection
