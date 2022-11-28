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
                              action="{{route('user_image_store',['product_id'=>$data->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-10">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="col-md-10">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Add image</button>
                            </div>
                        </form>
                        <hr>
                        <table class="table table-striped table-bordered" >
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
                                        <a href="{{route('user_image_delete',['id'=>$rs->id, 'product_id'=>$data->id])}} "
                                           onclick="return confirm('Record will be Delete! Are you sure?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                                 viewBox="0 0 35 35" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-trash-2 text-primary">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
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
