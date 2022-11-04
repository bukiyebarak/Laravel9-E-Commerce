
<li class="nav-item"><a href="{{route('categoryproducts',['id'=>$childCategory->id, 'slug'=>$childCategory->slug])}}" class="nav-link">{{$childCategory->title}}</a></li>
@if($childCategory->children)
    <ul class="dropdown-menu">
        @foreach($childCategory->children as $childCategory )
            @include('home.categorytree',['childCategory'=>$childCategory])
        @endforeach
    </ul>
@endif
