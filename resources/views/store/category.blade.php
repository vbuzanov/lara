@extends('layouts.main')

@section('content')
    <h1>{{$category->name}}</h1>

    @foreach ($products as $product)
        @include('store.parts._product')
    @endforeach

{{$products->links()}}

@endsection