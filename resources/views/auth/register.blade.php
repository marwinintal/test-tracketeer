@extends('layout.app')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="tel" name="telephone" id="telephone" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <Label>Address 1</Label>
                    <div class="form-group">
                        <input type="text" name="address_1" id="address_1" class="form-control" placeholder="Address 1">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address_2" id="address_2" class="form-control" placeholder="Address 2">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <input type="text" name="state" id="state" class="form-control" placeholder="State">
                            </div>
                            <div class="col-4">
                                <input type="text" name="city" id="city" class="form-control" placeholder="City">
                            </div>
                            <div class="col-4">
                                <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Postal Code">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="response-message"></div>
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
                        if (!response.success) {
                            $('#response-message').html(`<p style="color: red;">${response.message}</p>`);
                            return;
                        }

                        window.location.href = '/thank-you/' + response.user_id;
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '<ul>';
                            $.each(errors, function(key, value) {
                                errorMessage += `<li>${value[0]}</li>`;
                            });
                            errorMessage += '</ul>';
                            $('#response-message').html(`<p style="color: red;">${errorMessage}</p>`);
                        } else {
                            $('#response-message').html('<p style="color: red;">An unexpected error occurred. Please try again.</p>');
                        }
                    }
                });
            });
        });
    </script>
@endpush
