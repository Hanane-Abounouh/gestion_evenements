@extends('layouts.app')

@section('title', 'Tableau de bord')

@section('content')
    <section class="py-8 z-10 font-serif bg-gray-900  text-white">
        <div class="flex flex-col md:flex-row items-center max-w-6xl px-6 py-8 mx-auto">
            <div class="w-full md:w-1/2 py-8">
                <h1 class="text-7xl font-semibold leading-none tracking-tighter">
                    Welcome to <br><span class="text-yellow-500">Event-Planner Admin Dashboard</span>
                </h1>
                <p class="text-lg mt-4">Bienvenue, {{ Auth::user()->name }}!</p>
            </div>
           
        </div>
    </section>
@endsection
