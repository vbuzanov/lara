@extends('layouts.main')

@section('content')
    <h1>{{$product->name}}</h1>

    @include('store.parts._product')
    <p>{{$product->description}}</p>
    
    <form action="" class="form-add-to-cart">
        <div class="form-group">
            <input type="number" class="form-control" name="qty"  value="1">
        </div>
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <button class="btn btn-primary">Add to Cart</button>
    </form>


    <h3>Add a review</h3>
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