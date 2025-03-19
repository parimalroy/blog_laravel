<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue.js Inspired Blog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 font-sans">
    <!-- Header -->
    <header class="bg-slate-800 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="#" class="text-3xl font-bold">Blogify</a>

            <!-- Hamburger Button (Mobile) -->
            <button id="menu-toggle" class="text-white md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Navigation Menu -->
            <nav id="menu" class="hidden md:flex space-x-6">
                <a href="{{ route('home.index') }}"
                    class="hover:underline px-4 py-2 rounded-md bg-slate-700 font-bold text-white">Home</a>
                <a href="{{ route('categorie.list') }}"
                    class="hover:underline text-slate-300 px-4 py-2 rounded-md">Categories</a>
                <a href="{{ route('home.list') }}" class="hover:underline text-slate-300 px-4 py-2 rounded-md">List</a>
                @if (Auth::check())
                    <a href="#" class="text-white-700 px-4 py-2 rounded-md">{{ Auth::user()->name }}</a>
                @else
                    <a href="{{ route('login.index') }}" class="hover:underline text-slate-300 px-4 py-2 rounded-md">Log
                        In</a>
                @endif
            </nav>
        </div>

        <!-- Mobile Menu -->
        <nav id="mobile-menu" class="hidden md:hidden bg-slate-800">
            <ul class="flex flex-col space-y-4 p-4 text-white">
                <li><a href="" class="font-bold text-white bg-slate-700 px-4 py-2 rounded-md">Home</a></li>
                <li><a href="#" class="hover:underline text-slate-300 px-4 py-2 rounded-md">Categories</a></li>
                <li><a href="#" class="hover:underline text-slate-300 px-4 py-2 rounded-md">About</a></li>
                <li><a href="#" class="hover:underline text-slate-300 px-4 py-2 rounded-md">Contact</a></li>
            </ul>
        </nav>
    </header>
