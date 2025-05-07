@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $livestream->title }}</h2>
    <p>{{ $livestream->description }}</p>

    <div class="embed-responsive embed-responsive-16by9 mb-3">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $livestream->embed_url }}" allowfullscreen></iframe>
    </div>

    @auth
        @if(Auth::id() === $livestream->user_id)
            <form method="POST" action="{{ route('livestreams.deactivate', $livestream) }}">
                @csrf
                <button class="btn btn-danger">End Livestream</button>
            </form>
        @endif
    @endauth
</div>
@endsection
