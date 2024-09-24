@extends('layout.app')
@section('title', 'Signup')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="mt-3">
                @csrf

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Login</button>

                @if (session('error'))
                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        console.log('@registration')
        $(document).ready(function() {
            $('#register-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{ route("register.submit") }}',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#responseMessage').html(`<p style="color: green;">${response.success}</p>`);
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '<ul>';
                            $.each(errors, function(key, value) {
                                errorMessage += `<li>${value[0]}</li>`;
                            });
                            errorMessage += '</ul>';
                            $('#responseMessage').html(`<p style="color: red;">${errorMessage}</p>`);
                        } else {
                            $('#responseMessage').html('<p style="color: red;">An unexpected error occurred. Please try again.</p>');
                        }
                    }
                });
            });
        });
    </script>
@endpush
