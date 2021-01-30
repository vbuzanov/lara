<div class="list-group">
    @foreach ($shareCategories as $category)
        <a href="/category/{{$category->slug}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ Request::is('category/'.$category->slug) ? 'active' : '' }}">
            {{$category->name}} 

            <span class="badge badge-secondary badge-pill">{{$category->products_count}}</span>
        </a>
    @endforeach
</div>