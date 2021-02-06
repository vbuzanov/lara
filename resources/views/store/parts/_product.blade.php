<div class="d-inline-flex p-2 bd-highlight w-25 p-3 border shadow-sm p-3 mb-5 bg-light rounded">
    <div class="">
        <img src="{{$product->img}}" alt="{{$product->name}}">
        <p>{{$product->name}}</p>
        <p>{{$product->price}} UAH</p>
        <a href="#" data-toggle="tooltip" rel="tooltip" data-placement="top" title="{{$product->reviews_count}}">Review</a>
    </div>
</div>