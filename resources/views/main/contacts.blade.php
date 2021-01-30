@extends('layouts.main')

@section('content')
    <h1>Contacts</h1>
    @include('messages.errors')

        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>    
        @endif

    <form action="/contacts" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
            @error('name') 
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message">{{old('message')}}</textarea>
        </div>

        <button class="btn btn-primary mt-2">Send</button>

    </form>
@endsection

@section('title', 'Contacts')




@section('sidebar')
    Address
    @parent
@endsection