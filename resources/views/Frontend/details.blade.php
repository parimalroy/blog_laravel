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
            <!-- Comment Box (First) -->
            <form action="{{ route('comment.store') }}" method="post">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <div class="max-w-4xl mx-auto mt-10 p-4 bg-white rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold mb-4">Leave a Comment</h2>
                    @include('../message')
                    <textarea placeholder="Write your comment..." rows="4"
                        class="w-full p-2 border border-gray-300 rounded-md @error('comment') is-invalid @enderror" name="comment"></textarea>
                    @error('comment')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                    @if (Auth::check())
                        <div class="flex justify-end mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Post Comment</button>
                        </div>
                    @else
                        <div class="flex justify-end mt-4">
                            <a href="{{ route('login.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Post
                                Comment</a>
                        </div>
                    @endif
                </div>
            </form>
            <!-- Comment Box with Reply Button (Second) -->
            @if ($blog->comments->isNotEmpty())
                @foreach ($blog->comments as $cmt)
                    <div class="max-w-4xl mx-auto mt-6 p-4 bg-white rounded-lg shadow-lg mb-6">
                        <div class="flex items-start space-x-4">

                            <img width="50px" height="50px" src="{{ asset('storage/' . $cmt->users->photo) }}"
                                alt="User" class="rounded-full">
                            <div class="w-full">
                                <p class="text-sm font-semibold">{{ $cmt->users->name }} ( {{ $cmt->created_at }} )</p>
                                <p class="text-gray-700 mt-2">{{ $cmt->comment }}</p>
                                @if (Auth::check())
                                    {{-- <button id="openReplyModal" class="text-blue-500 text-xs mt-2">Reply</button> --}}
                                    <form action="{{ route('store.reply') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="comment_id" value="{{ $cmt->id ?? '' }}">
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <input type="text" name="title"
                                            class="w-full mt-4 mb-1 p-2 border border-gray-300 rounded-md @error('title') is-invalid @enderror">
                                        {{-- @error('title')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror --}}

                                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Reply</button>
                                    </form>
                                @else
                                    <a href="{{ route('login.index') }}" id=""
                                        class="text-blue-500 text-xs mt-2">Reply</a>
                                @endif
                            </div>

                        </div>
                        @if ($cmt->replies->isNotEmpty())
                            @foreach ($cmt->replies as $reply)
                                @if ($cmt->id == $reply->comment_id)
                                    <div class="flex items-start space-x-4 m-5 pb-4 border-b-4">
                                        <h1></h1>
                                        <img width="50px" height="50px"
                                            src="{{ asset('storage/' . $reply->users->photo) }}" alt="User"
                                            class="rounded-full">
                                        <div class="w-full">
                                            <p class="text-sm font-semibold">{{ $reply->users->name }}</p>

                                            <p class="text-gray-700 mt-2">{{ $reply->title }}</p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif

                    </div>
                    {{-- @endforeach
            @endif --}}

                    <!-- Reply Modal (Third) -->
                    {{-- <form action="{{ route('store.reply') }}" method="post">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $cmt->id ?? '' }}">
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <div id="replyModal"
                            class="fixed top-20 bg-gray-800 bg-opacity-50 hidden justify-center items-center z-50">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                <h3 class="text-xl font-semibold mb-4">Reply to {{ $cmt->users->name ?? '' }}</h3>
                                <textarea id="replyText" rows="4"
                                    class="w-full p-2 border border-gray-300 rounded-md @error('title') is-invalid @enderror" name="title"></textarea>
                                @error('title')
                                    <div class="text-red-600">{{ $message }}</div>
                                @enderror
                                <div class="flex justify-end mt-4">
                                    <button type="submit" id="closeReplyModal"
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md">Send
                                        Reply</button>
                                </div>
                            </div>
                        </div>
                    </form> --}}
                @endforeach
            @endif
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
