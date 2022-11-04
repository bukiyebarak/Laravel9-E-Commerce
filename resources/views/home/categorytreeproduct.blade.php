
<li><a href="{{route('categoryproducts',['id'=>$childCategory->id, 'slug'=>$childCategory->slug])}}" >{{$childCategory->title}}</a></li>
@if($childCategory->children)
    <ul class="collections-list-row">
        @foreach($childCategory->children as $childCategory )
            @include('home.categorytree',['childCategory'=>$childCategory])
        @endforeach
    </ul>
@endif
