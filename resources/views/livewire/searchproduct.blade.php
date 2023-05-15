<div>
    <input wire:model="search" name="search" type="search" list="mylist" class="search-field" placeholder="@lang("Search")..." autocomplete="off">

    @if(!empty($query))
        <datalist id="mylist">
            @foreach($datalist as $rs)
                <option value="{{$rs->title}}">{{$rs->category->title}} </option>
            @endforeach
        </datalist>
    @endif
</div>
