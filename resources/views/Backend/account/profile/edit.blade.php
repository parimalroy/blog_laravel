@extends('Backend.account.layout.app')
@section('content')
    <section class="p-8">
        @include('../../message')

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Profile Picture Section -->
                <div class="flex items-center justify-center mb-8">
                    <div class="relative">
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile Picture"
                            class="w-32 h-32 rounded-full object-cover shadow" id="photo">
                        <label for="profile_picture"
                            class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full cursor-pointer hover:bg-blue-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                        </label>
                        {{-- <input type="file" id="profile_picture" name="profile_picture" class="hidden" accept="image/*"
                            onchange="previewProfileImage(event)"> --}}
                    </div>
                </div>

                <!-- Full Name -->
                <div class="mb-6">
                    <label for="name" class="block text-slate-700 font-medium mb-2">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ $users->name }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-slate-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ $users->email }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <!-- photo -->
                <div class="mb-6">
                    <label for="email" class="block text-slate-700 font-medium mb-2">profile photo</label>
                    <input type="file" id="email" name="photo" value=""
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('photo') is-invalid @enderror"
                        accept=".jpg,.png,.jpeg"
                        onchange="document.querySelector('#photo').src=window.URL.createObjectURL(this.files[0])">
                    @error('photo')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                {{-- <div class="mb-6">
                    <label for="password" class="block text-slate-700 font-medium mb-2">New Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400"
                        placeholder="Enter new password (optional)">
                </div> --}}

                <!-- Confirm Password -->
                {{-- <div class="mb-6">
                    <label for="confirm_password" class="block text-slate-700 font-medium mb-2">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400"
                        placeholder="Confirm new password">
                </div> --}}

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('profile.index') }}"
                        class="px-6 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-500 transition">Cancel</a>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-500 transition">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </section>
@endsection
