<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app" x-data="{ sidenav: false }">
        <!-- Main Navigation -->
        <nav class="bg-gray-900">
            <div class="mx-auto px-28">
                <ul class="flex items-center justify-between py-4">
                    <li>
                        <ul class="flex items-center gap-x-8">
                            <li class="mr-20">
                                <a class="text-gray-50 hover:opacity-80" href="{{ url('/') }}">
                                    <div>
                                        <span class="text-xl font-bold">Event-</span>
                                        <span class="text-xl font-bold text-yellow-600">Planner</span>
                                    </div>
                                </a>
                            </li>
                            <li class="hidden md:block">
                            <a class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80" href="{{ url('/') }}">home</a>
                           </li>

                            <li class="hidden md:block">
                                <a class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80" href="{{ url('/about') }}">About</a>
                            </li>
                            <li class="hidden md:block">
                                <a class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">Contact</a>
                            </li>
                            <li class="hidden md:block">
                                <a class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80" href="{{ url('/events/create') }}">CreateEvent</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="flex items-center gap-x-4">
                            @auth
                                @if(Auth::user()->role === 'admin')
                                    <li><a class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80" href="{{ route('dashboard') }}">Dashboard</a></li>
                                @else
                                    <li><a class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80" href="{{ route('profile.edit') }}">Profile</a></li>
                                @endif
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">Logout</button>
                                    </form>
                                </li>
                            @else
                                <li><a class="cursor-pointer bg-transparent px-4 py-2 text-sm font-medium text-gray-50 hover:text-gray-50/80" href="{{ route('login') }}">Sign In</a></li>
                                <li><a class="cursor-pointer bg-yellow-600 px-4 py-2 text-sm font-medium text-gray-50 text-gray-50 hover:text-gray-50/80" href="{{ route('register') }}">Sign up</a></li>
                            @endauth
                            <li class="md:hidden">
                                <button
                                    x-on:click="sidenav = true"
                                    aria-label="menu button"
                                    class="cursor-pointer bg-yellow-600 px-2 py-2 text-sm font-medium text-gray-50 hover:text-gray-50/80"
                                >
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Side Navbar -->
            <!-- <div x-show="sidenav" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed top-0 right-0 z-50 h-full w-full bg-black bg-opacity-50" x-on:click="sidenav = false"></div>
            <div x-show="sidenav" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="fixed top-0 right-0 z-50 h-full w-[300px] bg-white shadow-lg">
                <div class="flex items-center justify-between border-b p-4">
                    <a class="cursor-pointer">
                        <div>
                            <span class="text-xl font-bold">Gorkha</span>
                            <span class="text-xl font-bold text-yellow-600">Job</span>
                        </div>
                    </a>
                    <button
                        aria-label="close"
                        x-on:click="sidenav = false"
                        class="text-gray-900 hover:text-gray-900/70"
                    >
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0118 0z" />
                        </svg>
                    </button>
                </div>
                <div class="border-b p-4">
                    <ul class="flex flex-col gap-y-3">
                        <li><a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70" href="{{ url('/') }}">Find a Job</a></li>
                        <li><a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">About</a></li>
                        <li><a class="cursor-pointer text-sm font-medium text-gray-900 hover:text-gray-900/70">Contact</a></li>
                    </ul>
                </div>
                <div class="p-4">
                    <a class="flex cursor-pointer items-center justify-center gap-x-2 rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-gray-50 hover:bg-gray-900/70">
                        <span>Make A Resume</span>
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </a>
                </div>
            </div> -->
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
</body>
</html>
