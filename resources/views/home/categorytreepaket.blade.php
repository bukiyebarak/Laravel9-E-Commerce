
<li class="nav-item"><a href="{{route('paket_product',['id'=>$rs->id,'slug'=>$rs->slug])}}" class="nav-link">{{$rs->title}}</a></li>
{{--@if($rs)--}}
{{--    <ul class="dropdown-menu">--}}
{{--        @foreach($parentPaketCategories as $rs)--}}
{{--            @include('home.categorytreepaket',['rs'=>$rs])--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--@endif--}}
