@extends('Frontend.layout.app')
@section('main')
    <section class="bg-white py-10">
        <div class="container mx-auto">
            <form class="flex flex-col md:flex-row items-center gap-6">
                <!-- Search -->
                <div class="flex-1 relative ">
                    <input type="text" name="search" placeholder="Search blogs..."
                        class="w-full px-4 py-3 border border-slate-300 rounded-full shadow-md focus:outline-none focus:ring focus:ring-slate-400" />
                </div>
                <!-- Filter by Category -->
                {{-- <div class="flex-1">
                    <select name="category"
                        class="w-full px-4 py-3 border border-slate-300 rounded-full shadow-md focus:outline-none focus:ring focus:ring-slate-400">
                        <option value="">Filter by category</option>
                        <option value="vuejs">Vue.js</option>
                        <option value="javascript">JavaScript</option>
                        <option value="frontend">Frontend</option>
                        <option value="backend">Backend</option>
                    </select>
                </div> --}}
                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="px-6 py-3 bg-slate-800 text-white rounded-full hover:bg-slate-700 transition">
                        Apply
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('content')
    <section class="py-2 bg-slate-50">
        <div class="container mx-auto">
            <h1 class="text-4xl font-extrabold text-slate-900 text-center mb-10">Explore Our Blogs</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Blog Card -->
                @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $blog)
                        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl overflow-hidden transition duration-300">
                            <img src="{{ asset('storage/' . $blog->photo) }}" alt="Blog Post"
                                class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-slate-800 mb-2">{{ $blog->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ substr($blog->content, 0, 100) }}</p>
                                <a href="{{ route('home.detail', $blog->id) }}"
                                    class="text-slate-800 font-medium hover:underline">Read More</a>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- Repeat similar cards for other blogs -->
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex space-x-2 justify-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
@endsection
