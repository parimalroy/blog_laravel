@extends('Frontend.layout.app')
@section('main')
    <!-- Hero Section -->
    <section class="text-white py-20 bg-slate-800 ">
        <div class="container  mx-auto text-center ">
            <h1 class="text-white text-4xl font-bold">Categorie List</h1>
        </div>
    </section>
@endsection
@section('content')
    <div class="mt-30   grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-40">
        <!-- Category 1 -->
        @if ($categories->isNotEmpty())
            @foreach ($categories as $category)
                <div
                    class="bg-slate-500 text-white rounded-lg shadow-lg hover:shadow-xl transform transition duration-300 ease-in-out hover:scale-105">
                    <div class="p-6 text-center">
                        <i class="fas fa-laptop-code text-4xl mb-4"></i> <!-- Example icon (Font Awesome) -->
                        <h3 class="text-xl font-bold mb-2"><a
                                href="{{ route('categorie.single', $category->id) }}">{{ $category->name }}</a></h3>
                        <p class="text-sm">Explore the latest tech trends, gadgets, and software.</p>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center my-10">
                <h1 class=" text-3xl">No Blog Found</h1>
            </div>
        @endif


    </div>
@endsection
