<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Blogify</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 font-sans min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-slate-800 mb-6 text-center">Login to Blogify</h1>
        @include('../../message')

        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-slate-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('email') is-invalid @enderror"
                    placeholder="Enter your email">
                @error('email')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block text-slate-700 font-medium mb-2">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('password') is-invalid @enderror"
                    placeholder="Enter your password">
                @error('password')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex items-center justify-between mb-6">
                <label class="inline-flex items-center text-slate-600">
                    <input type="checkbox" class="form-checkbox text-slate-600 focus:ring focus:ring-slate-400 rounded"
                        name="remember">
                    <span class="ml-2">Remember me</span>
                </label>
                {{-- <a href="#" class="text-slate-600 hover:underline text-sm">Forgot Password?</a> --}}
            </div>
            <button type="submit"
                class="w-full px-4 py-2 bg-slate-800 text-white font-bold rounded-lg hover:bg-slate-700 transition">Login</button>
        </form>
        <p class="text-center text-slate-600 mt-4">Don't have an account? <a href="{{ route('register.index') }}"
                class="text-slate-800 font-bold hover:underline">Sign Up</a></p>
    </div>
</body>

</html>
