@extends('Frontend.layout.app')
@section('content')
    <!-- Blog Details -->
    <section class="bg-white">
        <div class="container mx-auto px-6 py-12">
            <!-- Blog Header -->
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-slate-900 mb-4">{{ $blog->title }}</h1>
                <p class="text-slate-500 text-lg">Published on <span class="font-medium">{{ $blog->created_at }}</span></p>
            </div>
            <!-- Blog Image -->
            <div class="mt-8 ">
                <img src="{{ asset('storage/' . $blog->photo) }}" alt="Blog Banner"
                    class="w-full mx-auto md:w-3/4 lg:w-2/3 max-h-80 rounded-lg shadow-md">
            </div>
            <!-- Blog Content -->
            <div class="mt-5 mx-auto md:w-3/4 lg:w-2/3">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    {{ $blog->content }}
                </div>
            </div>

        </div>

        </div>
    </section>
    <!-- Related Blogs -->
    <section class="bg-slate-50 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-slate-800 mb-8">Related Blogs</h2>
            @if ($reletedBlog->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($reletedBlog as $blogs)
                        <!-- Blog Card -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('storage/' . $blogs->photo) }}" alt="Blog Thumbnail" class="w-full">
                            <div class="p-4">
                                <h3 class="text-xl font-bold text-slate-900 mb-2">T{{ $blogs->title }}</h3>
                                <p class="text-slate-600 text-sm">{{ substr($blogs->content, 0, 100) }}</p>
                                <a href="{{ route('home.detail', $blogs->id) }}"
                                    class="text-slate-700 font-medium hover:underline mt-4 inline-block">Read
                                    More</a>
                            </div>
                        </div>
                        <!-- Repeat similar cards for other related blogs -->
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
