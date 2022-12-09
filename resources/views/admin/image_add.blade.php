<html>
<head>
    <title>Image Gallery</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--favicon-->
    <link rel="icon" href="{{asset('assets')}}/admin/assets/images/favicon-32x32.png" type="image/png"/>
    <!--plugins-->
    <link href="{{asset('assets')}}/admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="{{asset('assets')}}/admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{asset('assets')}}/admin/assets/css/pace.min.css" rel="stylesheet"/>
    <script src="{{asset('assets')}}/admin/assets/js/pace.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets')}}/admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/app.css" rel="stylesheet">
    <link href="{{asset('assets')}}/admin/assets/css/icons.css" rel="stylesheet">

</head>
<body>

@include('sweetalert::alert')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <!--end breadcrumb-->
        <div class="card">
            <div class="card-body">
                <h4 class="mb-0">Product: {{$data->title}}</h4>
                <hr/>
                <div class="row gy-3">
                    <div class="col-md-12">
                        <form class="row g-3 needs-validation" novalidate=""
                              action="{{route('admin_image_store',['product_id'=>$data->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-10">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif

                            </div>

                            <div class="col-md-10">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Add image</button>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->title}}</td>
                                    <td>
                                        @if($rs->image)
                                            <img src="{{asset('images/'.$rs->image)}}" height="60" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin_image_delete',['id'=>$rs->id, 'product_id'=>$data->id])}} "
                                           onclick="return confirm('Record will be Delete! Are you sure?')">
                                            delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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

@section('footer')
</body>
</html>
