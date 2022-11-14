<!doctype html>
<html lang="en">
<head>

</head>
<body>

@foreach($datalist as $datalist)
   Name: {{$datalist->product->title}}
   @if($datalist->product->image!=null)
       <img src="{{Storage::url($datalist->product->image)}}"
            style="height: 90px;" alt="">
   @endif
<br>
@endforeach

</body>
</html>
