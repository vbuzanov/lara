<div class="form-group">
    {!! Form::label('name', 'Slider Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name') 
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('description', 'Slider Description:') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control' . ($errors->has('description') ? ' is-invalid' : '')]) !!}
    @error('description') 
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('button_text', 'Slider Button Text:') !!}
    {!! Form::text('button_text', null, ['class'=>'form-control' . ($errors->has('button_text') ? ' is-invalid' : '')]) !!}
    @error('button_text') 
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('button_url', 'Slider button URL:') !!}
    {!! Form::text('button_url', null, ['class'=>'form-control' . ($errors->has('button_url') ? ' is-invalid' : '')]) !!}
    @error('button_url') 
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>


{!! Form::label('img', 'Slider Image:') !!}
<div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control @error('img') is-invalid @enderror" type="text" name="img"  value="@isset($slider) {{$slider->img}} @endisset">
    @error('img') 
    <div class="invalid-feedback">{{$message}}
    @enderror
</div>

<div id="holder" style="margin-top:15px;max-height:100px;">
    @isset($slider)
        <img src="{{$slider->img}}" alt="" style="max-height:100px;">
    @endisset
</div>


<button class="btn btn-primary">Save</button>