@include('Frontend.layout.header')

@yield('main')

<!-- Blog Posts -->
<main id="posts" class="container mx-auto px-6 py-12">
    @yield('content')
</main>

<!-- Footer -->
@include('Frontend.layout.footer')
