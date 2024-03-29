@extends('layouts.admin')

@section('title', __('Add Product'))

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
                <div class="breadcrumb-title pe-3">@lang("ADD PRODUCT")</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang("Add Paket Product")</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <span class="float-end">* : @lang("Zorunlu girilmesi gereken yerler")</span>
                    <h4 class="mb-0">@lang("Add Product")</h4>
                    <hr/>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation" novalidate=""
                                  action="{{route('admin_paket_product_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label>@lang("Paket Category")*</label>
                                    <select class="form-select" name="paket_category_id" required>
                                        @foreach($data as $rs)
                                            <option
                                                value="{{$rs->id}}">{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Product Category")*</label>
                                    <select class="form-select" name="category_id" required>
                                        @foreach($datalist as $rs)
                                            <option
                                                value="{{$rs->id}}"> @if(Session::get('applocale')=="tr" or config('app.locale')=="tr")
                                                    {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title_tr)}}
                                                @elseif( Session::get('applocale')=="en" or config('app.locale')=="en")
                                                    {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title_en)}}
                                                @endif </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Title")*</label>
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Keywords")*</label>
                                    <input type="text" name="keywords" class="form-control" value="{{old('keywords')}}">
                                    @if ($errors->has('keywords'))
                                        <span class="text-danger">{{ $errors->first('keywords') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Description")*</label>
                                    <input type="text" name="description" class="form-control"
                                           value="{{old('description')}}">
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Price")*</label>
                                    <input type="number" min="0" name="price" class="form-control"
                                           value="{{old('price')}}">
                                    @if ($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label>@lang("Is Sale?")</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_sale"
                                               id="flexRadioDefault1" value="Yes">
                                        <label class="form-check-label" for="flexRadioDefault1">Yes</label>
                                        <br></div>
                                    <div id="sale">
                                        <label>@lang("How many percent discount is there? (Example:% sale)")</label>
                                        <input type="number" name="sale" min="0" class="form-control">
                                        @if ($errors->has('sale'))
                                            <span class="text-danger">{{ $errors->first('sale') }}</span>
                                        @endif
                                        <br>
                                    </div>
                                    <div class="form-check col-md-12">
                                        <input class="form-check-input" type="radio" name="is_sale"
                                               id="flexRadioDefault2" value="No" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">@lang("No")</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Quantity* (Kapsul Quantity)")</label>
                                    <input type="number" min="0" name="quantity" class="form-control"
                                           value="{{old('quantity')}}">
                                    @if ($errors->has('quantity'))
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Tax")*</label>
                                    <input type="number" name="tax" min="0" class="form-control" value="{{old('tax')}}">
                                    @if ($errors->has('tax'))
                                        <span class="text-danger">{{ $errors->first('tax') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Detail")*</label>
                                    <textarea id="summernote" name="detail">{{old('detail')}}</textarea>
                                    <script>
                                        $('#summernote').summernote({
                                            placeholder: " " ,
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
                                <div class="col-md-12">
                                    <label>@lang("Slug")*</label>
                                    <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Image")*</label>
                                    <input type="file" name="image" class="form-control">
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <label>@lang("Status")</label>
                                    <select class="form-select" name="status" required>
                                        <option selected="">False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">@lang("Add Product")</button>
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

        $(document).ready(function () {
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
