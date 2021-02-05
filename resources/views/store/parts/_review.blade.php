@include('messages.errors')

@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>    
@endif

@auth            

<form action="/reviews" method="POST" class="col-md-6">
    @csrf
    <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
        @error('name') 
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="review">Your Review</label>
        <textarea class="form-control @error('review') is-invalid @enderror" name="review" id="review">{{old('review')}}</textarea>
        @error('review') 
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>

    <input type="hidden" name="product_id" value="{{isset($product) ? $product->id : null}}">

    <button class="btn btn-primary mt-2">Send</button>

</form>
@else
<p><a href="/login">Login</a>  or <a href="/register">register</a> </p>
@endauth

