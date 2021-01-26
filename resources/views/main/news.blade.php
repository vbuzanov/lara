@extends('layouts.main')

@section('content')
    <h1>{{$title}}</h1>
    <div class="news"> 
    @foreach ($news as $new1)

        <article>
            <img src="{{$new1->img}}" alt="{{$new1->title}}">
            <p>{{$new1->title}}</p>
            <p>{{$new1->short_content}}</p>
        </article>

    @endforeach
</div>
{{$news->links()}}
@endsection



@section('title', $title)

{{-- d-inline-flex p-2 bd-highlight w-25 p-3 border shadow-sm p-3 mb-5 bg-light rounded --}}