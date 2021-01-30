@extends('layouts.main')

@section('content')
    <h1>Review</h1>
    @include('messages.errors')

        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>    
        @endif

    @auth            
        
        <form action="/reviews" method="POST" class="col-md-6">
            @csrf
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
                @error('name') 
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="review">Your Review</label>
                <textarea class="form-control @error('review') is-invalid @enderror" name="review" id="review">{{old('review')}}</textarea>
                @error('review') 
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <button class="btn btn-primary mt-2">Send</button>

        </form>
    @else
        <p><a href="/login">Login</a>  or <a href="/register">register</a> </p>
    @endauth

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