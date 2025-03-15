@extends('Backend.account.layout.app')
@section('content')
    <section class="p-6">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
            <form id="categoriesForm">
                @csrf
                <!-- Full Name -->
                <div class="mb-6">
                    <input type="hidden" value="{{ $category->id }}" name="id">
                    <label for="name" class="block text-slate-700 font-medium mb-2">Categories Name</label>
                    <h2 id="success" class=" text-green-600"></h2>
                    <h2 id="error" class=" text-red-600"></h2>
                    <input type="text" id="name" name="name" value="{{ $category->name }}"
                        class="w-full px-4 mt-4 py-3 border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-slate-400 @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('category.index') }}"
                        class="px-6 py-3 bg-red-600 text-white font-bold rounded-lg hover:bg-red-500 transition">Cancel</a>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-500 transition"
                        id="submitBtn">Save
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#categoriesForm").submit(function(e) {
                e.preventDefault();
                let form = $("#categoriesForm")[0];
                let data = new FormData(form);
                $("#submitBtn").prop('disabled', true);
                $.ajax({
                    url: "{{ route('category.update') }}",
                    type: 'post',
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#success").text(response.message);
                        $("#submitBtn").prop('disabled', true);
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        let errormessage = [];
                        $.each(errors, function(field, message) {
                            errormessage += `<p>${message}</p>`
                        });
                        $('#error').html(errormessage);
                        $("#submitBtn").prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection
