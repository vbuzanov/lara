@extends('layouts.main')

@section('content')
    <h1>Review</h1>
    @include('store.parts._review')

    @forelse ($reviews as $review)
        <div class="alert border">
            <div>{{$review->created_at->format('d.m.Y')}} {{$review->name}}</div>
            <div>{{$review->review}}</div>
        </div>
        @empty
        <p>No reviews</p>    
    @endforelse

{{$reviews->links()}}
@endsection

@section('title', 'Review')