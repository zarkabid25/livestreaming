@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Live Now</h2>
    @forelse($livestreams as $stream)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $stream->title }}</h5>
                <p>{{ $stream->description }}</p>
                <small>By: {{ $stream->user->name }}</small><br>
                <a href="{{ route('livestreams.show', $stream) }}" class="btn btn-primary mt-2">Watch</a>
            </div>
        </div>
    @empty
        <p>No active livestreams right now.</p>
    @endforelse
</div>
@endsection
