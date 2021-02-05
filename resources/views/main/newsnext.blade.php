@extends('layouts.main')

@section('content')
    <h1>News</h1>

        <article class="newsnext">
            <img src="{{$newsnext->img}}" alt="{{$newsnext->title}}">
            <p>{{$newsnext->title}}</p>
            <p>{{$newsnext->content}}</p>
        </article>

@endsection



