@extends('Frontend.layout.app')
@section('main')
    <!-- Hero Section -->
    <section class="bg-slate-800 text-white py-20">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold mb-4">Welcome to Blogify</h1>
            <p class="text-lg font-medium mb-6">Discover the latest in tech, programming, and design inspired by Vue.js.
            </p>
            @if (Auth::check())
                <a href="{{ route('blog.create') }}"
                    class="px-6 py-3 bg-slate-700 text-white font-bold rounded-lg shadow-md hover:bg-slate-600 transition duration-300">
                    Browse Posts
                </a>
            @else
                <a href="{{ route('login.index') }}"
                    class="px-6 py-3 bg-slate-700 text-white font-bold rounded-lg shadow-md hover:bg-slate-600 transition duration-300">
                    Browse Posts
                </a>
            @endif
        </div>
    </section>
@endsection
@section('content')
    <h2 class="text-3xl font-bold text-slate-900 text-center mb-10">Latest Blog Posts</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Blog Card 1 -->
        @if ($blogs->isNotEmpty())
            @foreach ($blogs as $blog)
                <div class="bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                    <img src="{{ asset('storage/' . $blog->photo) }}" alt="Blog Post" class="rounded-t-lg">
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-800 mb-2">{{ $blog->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ substr($blog->content, 0, 200) }}</p>
                        <a href="{{ route('home.detail', $blog->id) }}"
                            class="text-slate-600 font-medium hover:underline">Read More</a>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Blog Card 2 -->
        {{-- <div class="bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
            <img src="https://via.placeholder.com/400x200" alt="Blog Post" class="rounded-t-lg">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-slate-800 mb-2">Top Vue.js Libraries in 2024</h3>
                <p class="text-gray-600 mb-4">A list of essential Vue.js libraries to speed up your development
                    process.</p>
                <a href="#" class="text-slate-600 font-medium hover:underline">Read More</a>
            </div>
        </div> --}}
        <!-- Blog Card 3 -->
        {{-- <div class="bg-white rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
            <img src="https://plus.unsplash.com/premium_photo-1664474619075-644dd191935f?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Blog Post" class="rounded-t-lg">
            <div class="p-6">
                <h3 class="text-2xl font-bold text-slate-800 mb-2">Mastering Vue Router</h3>
                <p class="text-gray-600 mb-4">Learn how to effectively manage navigation in your Vue.js
                    applications.</p>
                <a href="#" class="text-slate-600 font-medium hover:underline">Read More</a>
            </div>
        </div> --}}
    </div>
    <div>
        {{ $blogs->links() }}
    </div>
@endsection
