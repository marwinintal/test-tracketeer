@extends('layout.app')
@section('title', 'Subjects')
@section('content')
    <div class="container">
        <h3>MANY TO MANY</h3>
        @foreach ($subjects as $subject)
            <div class="card mb-2">
                <div class="card-header">
                    {{ $subject->name }}
                </div>
                <div class="card-body">
                    @foreach ($subject->users as $subject_user)
                        <p>{{ $subject_user->name }}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
