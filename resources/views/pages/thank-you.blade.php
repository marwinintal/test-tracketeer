@extends('layout.app')
@section('title', 'Thank You')
@section('content')
    <div class="container">
        Thank you for registering {{ $user->name }}
    </div>
@endsection
@push('scripts')
    <script>
        console.log('@thank-you')
    </script>
@endpush
