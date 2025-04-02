<header class="bg-blue-900 p-4 text-white">
  <div class="container mx-auto flex items-center justify-between">
    {{-- Logo --}}
    <h1 class="text-3xl font-semibold">
      <a href="{{ url('/') }}">Workopia</a>
    </h1>
    <nav class="hidden items-center space-x-4 md:flex">
      <x-nav-link url="/" :active="request()->is('/')">Home</x-nav-link>
      <x-nav-link url="/jobs" :active="request()->is('jobs')">All Jobs</x-nav-link>
      <x-nav-link url="/jobs/saved" :active="request()->is('jobs/saved')">Saved Jobs</x-nav-link>
      <x-nav-link url="/login" :active="request()->is('login')">Login</x-nav-link>
      <x-nav-link url="/register" :active="request()->is('register')">Register</x-nav-link>
      <x-nav-link url="/dashboard" :active="request()->is('dashboard')" icon="gauge">Dashboard</x-nav-link>
      <a href="{{ url('/jobs/create') }}"
        class="rounded bg-yellow-500 px-4 py-2 text-black transition duration-300 hover:bg-yellow-600 hover:shadow-md">
        <i class="fa fa-edit"></i> Create Job
      </a>
    </nav>
    <button id="hamburger" class="flex items-center text-white md:hidden">
      <i class="fa fa-bars text-2xl"></i>
    </button>
  </div>
  <!-- Mobile Menu -->
  <nav id="mobile-menu" class="mt-5 hidden space-y-2 bg-blue-900 pb-4 text-white md:hidden">
    <a href="{{ url('/jobs') }}" class="block px-4 py-2 hover:bg-blue-700">All Jobs</a>
    <a href="{{ url('/jobs/saved') }}" class="block px-4 py-2 hover:bg-blue-700">Saved Jobs</a>
    <a href="{{ url('/login') }}" class="block px-4 py-2 hover:bg-blue-700">Login</a>
    <a href="{{ url('/register') }}" class="block px-4 py-2 hover:bg-blue-700">Register</a>
    <a href="{{ url('/dashboard') }}" class="block py-2 text-white hover:underline">
      <i class="fa fa-gauge mr-1"></i> Dashboard
    </a>
    <a href="{{ url('/jobs/create') }}" class="block bg-yellow-500 px-4 py-2 text-black hover:bg-yellow-600">
      <i class="fa fa-edit"></i> Create Job
    </a>
  </nav>
</header>
