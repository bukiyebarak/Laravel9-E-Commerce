@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title','User Product Edit')
@section('javascript')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h4>User Product Edit</h4>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>User Product Edit</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Product Details Area -->
    <section class="products-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @include('home.usermenu')
                <div class="col-lg-9 col-md-12">
                <form action="{{route('user_product_update',['id'=>$data->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h6>Category</h6>
                        <select class="form-select" name="category_id">
                            @foreach($datalist as $rs)
                                <option value="{{$rs->id}}"
                                        @if($rs->id==$data->parent_id) selected="selected" @endif >
                                    {{ \App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h6>Title</h6>
                        <input type="text" name="title" value="{{$data->title}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <h6>Keywords</h6>
                        <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <h6>Description</h6>
                        <input type="text" name="description" value="{{$data->description}}"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <h6>Price</h6>
                        <input type="number" name="price" value="{{$data->price}}"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <h6>Stock</h6>
                        <input type="number" name="quantity" value="{{$data->quantity}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <h6>Minquantity</h6>
                        <input type="number" name="minquantity" value="{{$data->minquantity}}"
                               class="form-control"
                        >
                    </div>
                    <div class="form-group">
                        <h6>Tax</h6>
                        <input type="number" name="tax" value="{{$data->tax}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <h6>Detail</h6>
                        <textarea id="summernote" name="detail">{{$data->detail}}</textarea>
                        <script>
                            $('#summernote').summernote({
                                placeholder: 'Hello stand alone ui',
                                tabsize: 2,
                                height: 120,
                                toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'underline', 'clear']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['table', ['table']],
                                    ['insert', ['link', 'picture', 'video']],
                                    ['view', ['fullscreen', 'codeview', 'help']]
                                ]
                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <h6>Slug</h6>
                        <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <h6>Image</h6>
                        <input type="file" name="image" class="form-control">

                        @if($data->image)
                            <img src="{{asset('images/'.$data->image)}}" style="height: 100px;width: 100px" alt="">
                        @endif
                    </div>
                    <div class="form-group">
                        <h6>Status</h6>
                        <select class="form-select" name="status" required>
                            <option selected="">{{$data->status}}</option>
                            <option>True</option>
                            <option>False</option>
                        </select>
                    </div><br>
                    <button class="default-btn" type="submit">Update Product</button>

                </form>
                </div>
            </div>
        </div>

    </section>
    <!-- End Product Details Area -->

@endsection
