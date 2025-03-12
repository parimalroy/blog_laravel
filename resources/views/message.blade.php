@if (!empty(session('error')))
    <div class="text-red-600 bg-red-50 p-8">
        {{ session('error') }}
    </div>
@endif
@if (!empty(session('success')))
    <div class="text-green-500 bg-green-200 p-8">
        {{ session('success') }}
    </div>
@endif
