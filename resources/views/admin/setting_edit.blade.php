@extends('layouts.admin')

@section('title', __('Edit Setting'))

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
                <div class="breadcrumb-title pe-3">@lang("EDIT SETTING")</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang("Edit Setting")</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">@lang("Edit Setting")</h4>
                    <br>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation" novalidate=""
                                  action="{{route('admin_setting_update')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <ul class="nav nav-tabs nav-success" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#general" role="tab"
                                           aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bxs-home font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">@lang("General")</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#stmpemail" role="tab"
                                           aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i
                                                        class='bx bxs-message-alt-detail font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">@lang("Stmp Email")</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#socialmedia" role="tab"
                                           aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bxs-share-alt font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">@lang("Social Media")</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#about" role="tab"
                                           aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bxs-info-circle font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">@lang("About Us")</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#contactpage" role="tab"
                                           aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bxs-contact font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">@lang("Contact Page")</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reference" role="tab"
                                           aria-selected="false">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class='bx bxs-receipt font-18 me-1'></i>
                                                </div>
                                                <div class="tab-title">@lang("References")</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content py-6">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                                        <input type="hidden" id="id" name="id" value="{{$data->id}}"
                                               class="form-control">
                                        <div class="col-md-12">
                                            <label>@lang("Title")</label>
                                            <input type="text" id="title" name="title" value="{{$data->title}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang("Keywords")</label>
                                            <input type="text" name="keywords" value="{{$data->keywords}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang("Description")</label>
                                            <input type="text" name="description" value="{{$data->description}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang("Company")</label>
                                            <input type="text" name="company" value="{{$data->company}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang("Address")</label>
                                            <input type="text" name="address" value="{{$data->address}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang("Phone")</label>
                                            <input type="text" name="phone" value="{{$data->phone}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang("Fax")</label>
                                            <input type="text" name="fax" value="{{$data->fax}}" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>@lang("Email")</label>
                                            <input type="text" name="email" value="{{$data->email}}"
                                                   class="form-control">
                                        </div>

                                        <div class="col-md-12">
                                            <label>@lang("Status")</label>
                                            <select class="form-select" name="status" required>
                                                <option selected="">{{$data->status}}</option>
                                                <option>@if($data->status=="True")
                                                        False
                                                    @else
                                                        True
                                                    @endif</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="stmpemail" role="tabpanel">
                                        <div class="col-md-10">
                                            <label>Smtp @lang("Server")</label>
                                            <input type="text" name="smtpserver" value="{{$data->smtpserver}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-10">
                                            <label>Smtp @lang("Email")</label>
                                            <input type="text" name="smtpemail" value="{{$data->smtpemail}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-10">
                                            <label>Smtp @lang("Password")</label>
                                            <input type="password" name="smtppassword" value="{{$data->smtppassword}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-10">
                                            <label>Smtp @lang("Port")</label>
                                            <input type="number" name="smtpport" value="{{$data->smtpport}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="socialmedia" role="tabpanel">

                                        <div class="col-md-12">
                                            <label class="text-black">@lang("Facebook") <i class="lni lni-facebook-oval"></i></label>
                                            <input type="text" name="facebook" value="{{$data->facebook}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="text-black">@lang("Instagram") <i class="lni lni-instagram-original"></i></label>
                                            <input type="text" name="instagram" value="{{$data->instagram}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="text-black">@lang("Twitter") <i class="lni lni-twitter-original"></i></label>
                                            <input type="text" name="twitter" value="{{$data->twitter}}"
                                                   class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="text-black">@lang("Linkedin") <i class="lni lni-linkedin-original"></i></label>
                                            <input type="text" name="linkedin" value="{{$data->linkedin}}"
                                                   class="form-control">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="about" role="tabpanel">
                                        <div class="col-md-12">
                                            <label>@lang("About Us")</label>
                                            <textarea id="aboutus" name="aboutus">{{$data->aboutus}}</textarea>
                                            <script>
                                                $('#references').summernote({
                                                    placeholder: '',
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
                                                $('#contact').summernote({
                                                    placeholder: '',
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
                                                $('#aboutus').summernote({
                                                    placeholder: '',
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
                                    </div>
                                    <div class="tab-pane fade" id="contactpage" role="tabpanel">
                                        <div class="col-md-12">
                                            <label>@lang("Contact")</label>
                                            <textarea id="contact" name="contact">{{$data->contact}}</textarea>
                                            <script>
                                                $('#references').summernote({
                                                    placeholder: '',
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
                                                $('#contact').summernote({
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
                                                $('#aboutus').summernote({
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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="reference" role="tabpanel">
                                        <div class="col-md-12">
                                            <label>@lang("References")</label>
                                            <textarea id="references" name="references">{{$data->references}}</textarea>
                                            <script>
                                                $('#references').summernote({
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
                                                $('#contact').summernote({
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
                                                $('#aboutus').summernote({
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-success px-5 radius-30" type="submit">@lang("Update Setting")</button>
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
