<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Navbar</title>
  <script src="//unpkg.com/alpinejs" defer></script>
  @vite('resources/css/app.css')
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-800 text-gray-50">

<nav x-data="{ open: false }" class="bg-gray-900 fixed top-0 left-0 w-full shadow-lg z-10">
  <div class="mx-auto px-4 md:px-32">
    <ul class="flex items-center justify-between py-4">
      <!-- Left Section -->
      <li>
        <ul class="flex items-center mr-4 md:mr-20 gap-x-3 md:gap-x-7">
          <li class="mr-4 md:mr-20">
            <a href="/" class="flex items-center gap-x-2 text-gray-50 hover:opacity-80">
              <span class="text-xl font-bold">Event-</span>
              <span class="text-xl font-bold text-yellow-600">Planner</span>
            </a>
          </li>
          <li class="hidden md:block">
            <a href="/" class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">Home</a>
          </li>
          <li class="hidden md:block">
            <a href="/about" class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">About</a>
          </li>
          @auth
            @if (Auth::user()->isAdmin() || Auth::user()->isUser())
              <li class="hidden md:block">
                <a href="{{ route('events.create') }}" class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">Create Event</a>
              </li>
              <li class="hidden md:block">
                <a href="{{ route('events.myevents') }}" class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">My Events</a>
              </li>
            @endif
          @endauth
          @auth
            @if (Auth::user()->isAdmin() )
              <li class="hidden md:block">
                <a  class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">Users</a>
              </li>
             
            @endif
          @endauth
        </ul>
      </li>
      <!-- Right Section -->
      <li>
        <ul class="flex items-center gap-x-4">
          @auth
            <li class="hidden md:block">
              @if (Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">Welcome Admin</a>
              @else
                <a href="{{ route('profile') }}" class="cursor-pointer text-sm font-medium text-gray-50 hover:text-gray-50/80">Profile</a>
              @endif
            </li>
            <li class="hidden md:block">
              <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="cursor-pointer bg-transparent px-4 py-2 text-sm font-medium text-gray-50 hover:text-gray-50/80">Logout</button>
              </form>
            </li>
          @else
            <li class="hidden md:block">
              <a href="{{ route('login') }}" class="cursor-pointer text-sm font-medium bg-transparent py-2 px-4 text-gray-50 hover:text-gray-50/80">Login</a>
            </li>
            <li class="hidden md:block">
              <a href="{{ route('register') }}" class="cursor-pointer text-sm font-medium bg-yellow-600 px-4 py-2 text-gray-50 hover:text-gray-50/80">Register</a>
            </li>
          @endauth
          <!-- Mobile Menu Button -->
          <li class="md:hidden">
            <button
              x-on:click="open = true"
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

  <!-- Mobile Sidebar Menu -->
  <div x-show="open" x-transition class="fixed inset-0 z-50 flex">
    <div class="absolute inset-0 bg-black opacity-50" x-on:click="open = false"></div>
    <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white">
      <div class="absolute top-0 right-0 -mr-14 p-1">
        <button
          x-on:click="open = false"
          class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600"
          aria-label="Close sidebar"
        >
          <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
        <div class="flex-shrink-0 flex items-center px-4">
          <a href="/" class="flex items-center gap-x-2 text-gray-900">
            <span class="text-xl font-bold">Event-</span>
            <span class="text-xl font-bold text-yellow-600">Planner</span>
          </a>
        </div>
        <nav class="mt-5 px-2 space-y-1">
          <a href="/" class="text-gray-900 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Home</a>
          <a href="/about" class="text-gray-900 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">About</a>
          @auth
            @if (Auth::user()->isAdmin() || Auth::user()->isUser())
              <a href="{{ route('events.create') }}" class="text-gray-900 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Create Event</a>
              <a href="{{ route('events.myevents') }}" class="text-gray-900 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">My Events</a>
            @endif
            @if (Auth::user()->isAdmin())
              <a href="{{ route('admin.dashboard') }}" class="text-gray-900 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
            @else
              <a href="{{ route('profile') }}" class="text-gray-900 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Profile</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:text-gray-700">
              @csrf
              <button type="submit">Logout</button>
            </form>
          @else
            <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Login</a>
            <a href="{{ route('register') }}" class="text-gray-900 hover:text-gray-700 block px-3 py-2 rounded-md text-base font-medium">Register</a>
          @endauth
        </nav>
      </div>
    </div>
  </div>
</nav>

</body>
</html>
