@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Start a Livestream</h2>
    <form method="POST" action="{{ route('livestreams.store') }}">
        @csrf
        <input type="text" name="title" placeholder="Stream title" class="form-control my-2" required>
        <textarea name="description" class="form-control my-2" placeholder="Description" required></textarea>
        <input type="url" name="embed_url" class="form-control my-2" placeholder="Embed URL (YouTube/Vimeo)" required>
        <button type="submit" class="btn btn-success">Go Live</button>
    </form>
</div>
@endsection
