@extends('layouts.main')

@section('content')
    <h1>{{$title}} {!! $subtitle !!}</h1>
    

    @foreach ($products as $product)
        <div class="d-inline-flex p-2 bd-highlight w-25 p-3 border shadow-sm p-3 mb-5 bg-light rounded">
           
            <div class="">
                <img src="{{$product->img}}" alt="{{$product->name}}">
                <p>{{$product->name}}</p>
                <h4>Category: <a href="/category/{{$product->category->slug}}">{{$product->category->name}}</a></h4>
                <p>{{$product->price}} UAH</p>
            </div>
        </div>
    @endforeach
@endsection



@section('title', $title)