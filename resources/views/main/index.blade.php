@extends('layouts.main')

@section('content')
    <h1>{{$title}} {!! $subtitle !!}</h1>
    @include('main._slider')

    @foreach ($products as $product)
        <div class="d-inline-flex p-2 bd-highlight w-25 p-3 border shadow-sm p-3 mb-5 bg-light rounded">
           
            <div class="">
                <img src="{{$product->img}}" alt="{{$product->name}}">
                <p><a href="/product/{{$product->slug}}">{{$product->name}}</a></p>
                <h4>Category: <a href="/category/{{$product->category ? $product->category->slug : 'null'}}">{{$product->category ? $product->category->name : 'null'}}</a></h4>
                <p>{{$product->price}} UAH</p>
     
                <a href="#" data-toggle="tooltip" rel="tooltip" data-placement="top" title="{{$product->reviews_count}}">Review</a>


                
            </div>
        </div>
    @endforeach

    
    
@endsection



@section('title', $title)