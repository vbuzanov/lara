<div class="form-group">
    {!! Form::label('name', 'Product Name:') !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name') 
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>


<div class="form-group">
    {!! Form::label('slug', 'Product Slug:') !!}
    {!! Form::text('slug', null, ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : '')]) !!}
    @error('slug') 
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Product Category:') !!}
    {!! Form::select('category_id', $categories) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Product Price:') !!}
    {!! Form::number('price', null, ['step'=>'0.01', 'min'=>'0', 'class'=>'form-control' . ($errors->has('price') ? ' is-invalid' : '')]) !!}
    @error('price') 
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('recommended', 'Product Recommended:') !!}
    {!! Form::hidden('recommended', 0) !!}
    {!! Form::checkbox('recommended', 1) !!}
</div>


{!! Form::label('img', 'Product Image:') !!}
<div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control @error('img') is-invalid @enderror" type="text" name="img"  value="@isset($product) {{$product->img}} @endisset">
    @error('img') 
    <div class="invalid-feedback">{{$message}}
    @enderror
</div>

<div id="holder" style="margin-top:15px;max-height:100px;">
    @isset($product)
        <img src="{{$product->img}}" alt="" style="max-height:100px;">
    @endisset
</div>

<div class="form-group">
    {!! Form::label('recommendations[]', 'Recommended Products:') !!}
    {!! Form::select('recommendations[]', $products, null, ['multiple'=>true, 'class'=> 'form-control recommended_products']) !!}
</div>

<button class="btn btn-primary">Save</button>