@extends('Backend.account.layout.app')
@section('content')
    <section class="p-6">
        @include('../../message')
        <form action="{{ route('blog.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="block text-slate-700 font-medium mb-2">Blog Title</label>
                <input type="text" id="title" name="title"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('title') is-invalid @enderror"
                    placeholder="Enter the blog title">
                @error('title')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="author" class="block text-slate-700 font-medium mb-2">Author</label>
                <input type="text" readonly id="author" name="author" value="{{ Auth::user()->name }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400"
                    placeholder="Enter the author name">
            </div>

            <div class="mb-6">
                <label for="publish_date" class="block text-slate-700 font-medium mb-2">Blog Photo</label>
                <input type="file" id="publish_date" name="photo"
                    onchange="document.querySelector('#photo').src=window.URL.createObjectURL(this.files[0])"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('photo') is-invalid @enderror"
                    accept=".jpg, .png, .jpeg">
                @error('photo')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror

                <img height="50px" width="200px" src="" id="photo" alt="select photo">
            </div>

            <div class="mb-6">
                <label for="content" class="block text-slate-700 font-medium mb-2">Blog Content</label>
                <textarea id="content" name="content"
                    class="w-full h-64 px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('content') is-invalid @enderror"
                    placeholder="Write your blog content here..."></textarea>
                @error('content')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category" class="block text-slate-700 font-medium mb-2">Category</label>
                <select id="category" name="categorie_id"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('categorie_id') is-invalid @enderror">
                    <option value="">Select Category</option>
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif


                </select>
                @error('categorie_id')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('profile.index') }}"
                    class="px-6 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-500 transition">Cancel</a>
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-500 transition">Publish
                    Blog</button>
            </div>
        </form>
    </section>
@endsection
