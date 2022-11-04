<div>
    <input wire:model="search" name="search" type="text" list="mylist" class="input-search"  placeholder="Search here..." autocomplete="off">

    @if(!empty($query))
        <datalist id="mylist">
            @foreach($datalist as $rs)
                <option value="{{$rs->title}}">{{$rs->category->title}} </option>
            @endforeach
        </datalist>
    @endif
</div>
