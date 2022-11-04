@extends('layouts.admin')

@section('title', 'Add Product')

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
                <div class="breadcrumb-title pe-3">ADD FAQ</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Faq</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Add Faq</h4>
                    <hr/>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation" novalidate=""
                                  action="{{route('admin_faq_store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-10">
                                    <label>Position</label>
                                    <input type="number" value="0" name="position" class="form-control">
                                </div>
                                <div class="col-md-10">
                                    <label>Question</label>
                                    <input type="text" name="question" class="form-control">
                                </div>

                                <div class="col-md-10">
                                    <label>Answer</label>
                                    <textarea id="summernote" name="answer"></textarea>
                                    <script>
                                        $('#summernote').summernote({
                                            placeholder: 'Answer',
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

                                <div class="col-md-10">
                                    <label>Status</label>
                                    <select class="form-select" name="status" required>
                                        <option selected="">False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Add</button>
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
    </div>
    </div>
    <!--end page wrapper -->
@endsection

