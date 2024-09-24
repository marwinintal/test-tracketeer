@extends('layout.app')
@section('title', 'Subjects')
@section('content')
    <div class="container">
        @auth
            @php
                $user = Auth::user();
            @endphp
            <h3>ONE TO MANY</h3>
            <div class="card mb-2">
                <div class="card-header">
                    Subjects
                </div>
                <div class="card-body">
                    @foreach ($user->subjects as $subject)
                        <p>{{ $subject->name }}</p>
                    @endforeach
                </div>
            </div>
        @else
            Please log in to view your subjects.
        @endauth
    </div>
@endsection
@push('scripts')
    <script>
        console.log('@thank-you')
    </script>
@endpush
