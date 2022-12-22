@extends('layouts.admin')

@section('title', 'Edit Product')
@section('javascript')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
@endsection
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">EDIT PRODUCT</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Edit Product</h4>
                    <hr/>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form  action="{{route('admin_product_update',['id'=>$data->id])}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-10">
                                    <label>Category</label>
                                    <select class="form-select" name="category_id">
                                        @foreach($datalist as $rs)
                                            <option value="{{$rs->id}}"
                                                    @if($rs->id==$data->category_id) selected="selected" @endif> {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-10">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{$data->title}}" class="form-control">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Keywords</label>
                                    <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control">
                                    @if ($errors->has('keywords'))
                                        <span class="text-danger">{{ $errors->first('keywords') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Description</label>
                                    <input type="text" name="description" value="{{$data->description}}"
                                           class="form-control">
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Price</label>
                                    <input type="number" name="price" value="{{$data->price}}" min="0"
                                           class="form-control">
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Is Sale?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_sale" id="yes" value="Yes" checked>
                                        <label class="form-check-label" for="yes">Yes</label>
                                        <br>
                                    <div id="sale" >
                                        <label>How many percent discount is there? (Example:% sale)</label>
                                        <input type="number" name="sale" value="{{$data->sale}}" class="form-control" >
                                        @if ($errors->has('sale'))
                                            <span class="text-danger">{{ $errors->first('sale') }}</span>
                                        @endif
                                        <br>
                                    </div>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="is_sale" id="no" value="No">
                                        <label class="form-check-label" for="no">No</label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" value="{{$data->quantity}}" min="0"
                                           class="form-control">
                                    @if ($errors->has('quantity'))
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Minquantity</label>
                                    <input type="number" name="minquantity" value="{{$data->minquantity}}" min="0"
                                           class="form-control" >
                                    @if ($errors->has('minquantity'))
                                        <span class="text-danger">{{ $errors->first('minquantity') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Tax</label>
                                    <input type="number" name="tax" value="{{$data->tax}}" min="0" class="form-control">
                                    @if ($errors->has('tax'))
                                        <span class="text-danger">{{ $errors->first('tax') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Detail</label>
                                    <textarea id="summernote" name="detail">{{$data->detail}}</textarea>
                                    <script>
                                        $('#summernote').summernote({
                                            placeholder: 'Product Detail',
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
                                    @if ($errors->has('detail'))
                                        <span class="text-danger">{{ $errors->first('detail') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Slug</label>
                                    <input type="text" name="slug" value="{{$data->slug}}" class="form-control">
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Image</label>
                                    <input type="file" name="image" value="{{$data->image}}" class="form-control">

                                    @if($data->image)
                                        <img src="{{asset('images/'.$data->image)}}" height="150px" width="150px"
                                             alt=Image">
                                    @endif

                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label>Status</label>
                                    <select class="form-select" name="status" required>
                                        <option selected="">{{$data->status}}</option>
                                        <option>@if($data->status=="True")
                                                False
                                            @else
                                                True
                                            @endif</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-12">
                    <div id="todo-container"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('footer')
    <script>

        $(document).ready(function() {
            $('#sale').hide();
            $('input[type="radio"]').click(function () {
                if ($(this).attr("value") == "Yes") {
                    $('#sale').show();
                }
                if ($(this).attr("value") == "No") {
                    $('#sale').hide();
                }

            });
        });
        $('input[type="radio"]').trigger('click');
    </script>
@endsection
