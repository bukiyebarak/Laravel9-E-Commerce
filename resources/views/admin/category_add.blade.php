@extends('layouts.admin')

@section('title', __('Add Category'))
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
                <div class="breadcrumb-title pe-3">@lang("ADD CATEGORY")</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang("Add Category")</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <span class="float-end">* : @lang("Zorunlu girilmesi gereken yerler")</span>
                    <h4 class="mb-0">@lang("Add Category")</h4>
                    <hr/>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation" novalidate=""
                                  action="{{route('admin_category_create')}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label>@lang("Parent") *</label>
                                    <select class="form-select" name="parent_id" required>
                                        <option value="0" selected="">@lang("Main Category")</option>
                                        @foreach($datalist as $rs)
                                            <option
                                                value="{{$rs->id}}"> {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Title") (@lang("Türkçe"))*</label>
                                    <input type="text" id="title" name="title_tr" class="form-control"
                                           value=" {{old('title_tr')}}">
                                    @if ($errors->has('title_tr'))
                                        <span class="text-danger">{{ $errors->first('title_tr') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Slug") *</label>
                                    <input type="text" id="slug" name="slug" class="form-control" value=" {{old('slug')}}">
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Keywords") (@lang("Türkçe"))*</label>
                                    <input type="text" name="keywords_tr" class="form-control"
                                           value=" {{old('keywords_tr')}}">
                                    @if ($errors->has('keywords_tr'))
                                        <span class="text-danger">{{ $errors->first('keywords_tr') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Description") (@lang("Türkçe"))*</label>
                                    <input type="text" name="description_tr" class="form-control"
                                           value=" {{old('description_tr')}}">
                                    @if ($errors->has('description_tr'))
                                        <span class="text-danger">{{ $errors->first('description_tr') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Detail") (@lang("Türkçe"))*</label>
                                    <textarea id="summernote" name="detail_tr">{{old('detail_tr')}}</textarea>
                                    <script>
                                        $('#summernote').summernote({
                                            placeholder: ' ',
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
                                <div class="col-md-122">
                                    <label>@lang("Title") (@lang("İngilizce"))*</label>
                                    <input type="text" name="title_en" class="form-control"
                                           value=" {{old('title_en')}}">
                                    @if ($errors->has('title_en'))
                                        <span class="text-danger">{{ $errors->first('title_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Keywords") (@lang("İngilizce"))*</label>
                                    <input type="text" name="keywords_en" class="form-control"
                                           value=" {{old('keywords_en')}}">
                                    @if ($errors->has('keywords_en'))
                                        <span class="text-danger">{{ $errors->first('keywords_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Description") (@lang("İngilizce")) *</label>
                                    <input type="text" name="description_en" class="form-control"
                                           value=" {{old('description_en')}}">
                                    @if ($errors->has('description_en'))
                                        <span class="text-danger">{{ $errors->first('description_en') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="summernote1">@lang("Detail") (@lang("İngilizce"))*</label>
                                    <textarea id="summernote1" name="detail_en">{{old('detail_en')}}</textarea>
                                    <script>
                                        $('#summernote1').summernote({
                                            placeholder: ' ',
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
                                    <label>@lang("Status")</label>
                                    <select class="form-select" name="status">
                                        <option selected="">False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">@lang("Add Category")</button>
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
    $('#title').change(function (e) {
        $.get('{{route('checkSlug')}}',
            {'title_tr': $(this).val()},
            function (data) {
                $('#slug').val(data.slug);
            }
        );
    });
</script>
@endsection
