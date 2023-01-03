@extends('layouts.admin')

@section('title', 'Add Category')
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
                <div class="breadcrumb-title pe-3">ADD CATEGORY</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <span class="float-end">* : Zorunlu girilmesi gereken yerler</span>
                    <h4 class="mb-0">Add Category</h4>
                    <hr/>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation" novalidate=""
                                  action="{{route('admin_category_create')}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label>Parent *</label>
                                    <select class="form-select" name="parent_id" required>
                                        <option value="0" selected="">Main Category</option>
                                        @foreach($datalist as $rs)
                                            <option
                                                value="{{$rs->id}}"> {{\App\Http\Controllers\Admin\CategoryController::getParentsTree($rs,$rs->title) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-122">
                                    <label>Title *</label>
                                    <input type="text" name="title" class="form-control" value=" {{old('title')}}" >
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>Keywords *</label>
                                    <input type="text" name="keywords" class="form-control" value=" {{old('keywords')}}" >
                                    @if ($errors->has('keywords'))
                                        <span class="text-danger">{{ $errors->first('keywords') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>Description *</label>
                                    <input type="text" name="description" class="form-control" id="validationCustom02" value=" {{old('description')}}" >
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>Detail*</label>
                                    <textarea id="summernote" name="detail">{{old('detail')}}</textarea>
                                    <script>
                                        $('#summernote').summernote({
                                            placeholder: 'Category Detail',
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
                                    <label>Slug *</label>
                                    <input type="text" name="slug" class="form-control" value=" {{old('slug')}}">
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label>Status</label>
                                    <select class="form-select" name="status" >
                                        <option selected="">False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Add Category</button>
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
