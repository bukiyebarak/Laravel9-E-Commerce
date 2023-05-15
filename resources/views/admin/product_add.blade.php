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
                            <li class="breadcrumb-item active" aria-current="page">@lang("Add Product")</li>
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
                                  action="{{route('admin_product_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <label for="category">@lang("Category")*</label>
                                    <select id="category" class="form-select" name="category_id" required>
                                        @foreach($datalist as $rs)
                                            <option
                                                value="{{$rs->id}}">{{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title)}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Title") (@lang("Türkçe"))*</label>
                                    <input type="text" name="title_tr" class="form-control" value="{{old('title_tr')}}">
                                    @if ($errors->has('title_tr'))
                                        <span class="text-danger">{{ $errors->first('title_tr') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Keywords") (@lang("Türkçe"))*</label>
                                    <input type="text" name="keywords_tr" class="form-control" value="{{old('keywords_tr')}}">
                                    @if ($errors->has('keywords_tr'))
                                        <span class="text-danger">{{ $errors->first('keywords_tr') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Description") (@lang("Türkçe"))*</label>
                                    <input type="text" name="description_tr" class="form-control"
                                           value="{{old('description_tr')}}">
                                    @if ($errors->has('description_tr'))
                                        <span class="text-danger">{{ $errors->first('description_tr') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="summernote">@lang("Detail") (@lang("Türkçe"))*</label>
                                    <textarea id="summernote" name="detail_tr">{{old('detail_tr')}}</textarea>
                                    <script>
                                        $('#summernote').summernote({
                                            placeholder: ' ' ,
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
                                    @if ($errors->has('detail_tr'))
                                        <span class="text-danger">{{ $errors->first('detail_tr') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Title") (@lang("İngilizce"))*</label>
                                    <input type="text" name="title_en" class="form-control" value="{{old('title_en')}}">
                                    @if ($errors->has('title_en'))
                                        <span class="text-danger">{{ $errors->first('title_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Keywords") (@lang("İngilizce"))*</label>
                                    <input type="text" name="keywords_en" class="form-control" value="{{old('keywords_en')}}">
                                    @if ($errors->has('keywords_en'))
                                        <span class="text-danger">{{ $errors->first('keywords_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Description") (@lang("İngilizce"))*</label>
                                    <input type="text" name="description_en" class="form-control"
                                           value="{{old('description_en')}}">
                                    @if ($errors->has('description_en'))
                                        <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="summernote1">@lang("Detail") (@lang("İngilizce"))*</label>
                                    <textarea id="summernote1" name="detail_en">{{old('detail_en')}}</textarea>
                                    <script>
                                        $('#summernote1').summernote({
                                            placeholder: ' ' ,
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
                                    @if ($errors->has('detail_en'))
                                        <span class="text-danger">{{ $errors->first('detail_en') }}</span>
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
                                        <label class="form-check-label" for="flexRadioDefault1">@lang("Yes")</label>
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
                                    <label>@lang("Quantity")*</label>
                                    <input type="number" min="0" name="quantity" class="form-control"
                                           value="{{old('quantity')}}">
                                    @if ($errors->has('quantity'))
                                        <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Minquantity")*</label>
                                    <input type="number" min="0" name="minquantity" class="form-control"
                                           value="{{old('minquantity')}}">
                                    @if ($errors->has('minquantity'))
                                        <span class="text-danger">{{ $errors->first('minquantity') }}</span>
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
                                    <label>@lang("Slug")*</label>
                                    <input type="text" name="slug" class="form-control" value="{{old('slug')}}">
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Image")*</label>
                                    <input type="file" name="image" value="{{old('image')}}" class="form-control">
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
