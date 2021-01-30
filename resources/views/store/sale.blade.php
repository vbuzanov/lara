@extends('layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    @foreach ($products as $product)
        @include('store.parts._product')
    @endforeach

{{$products->links()}}
@endsection



@section('title', $title)

{{--     <h1>{{$title}}</h1>
    @foreach ($products as $product)
    <div class="d-inline-flex p-2 bd-highlight w-25 p-3 border shadow-sm p-3 mb-5 bg-light rounded">
        <div class="">
            <p>{{$product->name}}</p>
            <p>{{$product->price}} UAH</p>
        </div>
    </div>
    @endforeach --}}