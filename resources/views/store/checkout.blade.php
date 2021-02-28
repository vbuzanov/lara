@extends('layouts.main')

@section('content')
    <h1>Checkout</h1>
    <div class="modal-body">
        @include('store.parts._cart')
    </div>
    @if ($errors->any())
    <div class="alert alet-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        
    @endif
    
    {!! Form::open(['url'=>'/checkout']) !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone') !!}
        {!! Form::text('phone', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('address') !!}
        {!! Form::text('address', null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('checkout', ['class'=>'btn btn-primary']) !!}
    
    {!! Form::close() !!}

@endsection