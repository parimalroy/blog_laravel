@include('Backend.account.layout.header')
<!-- Sidebar and Main Content Container -->
<div class="flex min-h-screen">
    <!-- Sidebar -->
    @include('Backend.account.layout.sidebar')

    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Header with Profile -->
        <header class="flex items-center justify-between p-6 bg-white shadow-lg">
            <h1 class="text-3xl font-bold text-slate-800">Dashboard</h1>
            <!-- Profile Dropdown -->
            <div class="relative">
                <button id="profile-menu-button" class="flex items-center space-x-3 focus:outline-none">
                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile" class="w-10 h-10 rounded-full">
                    <span class="hidden md:block text-slate-800 font-medium">{{ Auth::user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-600" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06-.02L10 10.853l3.71-3.664a.75.75 0 111.04 1.082l-4.25 4.197a.75.75 0 01-1.042 0l-4.25-4.197a.75.75 0 01-.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <!-- Dropdown -->
                <div id="profile-menu"
                    class="absolute right-0 mt-2 w-48 bg-white border border-slate-200 rounded-lg shadow-lg hidden">
                    <a href="#" class="block px-4 py-2 text-slate-700 hover:bg-slate-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-slate-700 hover:bg-slate-100">Settings</a>
                    <a href="{{ route('profile.logout') }}"
                        class="block px-4 py-2 text-red-600 hover:bg-red-50">Logout</a>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        @yield('content')
    </main>
</div>
@include('Backend.account.layout.footer')
@yield('script')
