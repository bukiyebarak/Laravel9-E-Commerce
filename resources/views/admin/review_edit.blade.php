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

<div class="page-wrapper">
    <div class="card">
        <div class="card-body">      @include('sweetalert::alert')
            <h4 class="mb-0">Review Detail</h4>

            <hr/>
            <div class="row gy-3">
                <div class="col-md-12">
                    <form class="row g-3 needs-validation" novalidate=""
                          action="{{route('admin_review_update',['id'=>$data->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-10">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <td>{{$data->id}}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$data->user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Product</th>
                                    <td>{{$data->product->title}}</td>
                                </tr>
                                <tr>
                                    <th>Subject</th>
                                    <td>{{$data->subject}}</td>
                                </tr>
                                <tr>
                                    <th>Review</th>
                                    <td>{{$data->review}}</td>
                                </tr>
                                <tr>
                                    <th>Rate</th>
                                    <td>{{$data->rate}}</td>
                                </tr>
                                <tr>
                                    <th>IP</th>
                                    <td>{{$data->IP}}</td>
                                </tr>
                                <tr>
                                    <th>Created Data</th>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                                <tr>
                                    <th>Update Data</th>
                                    <td>{{$data->updated_at}}</td>
                                </tr>

                                <tr>
                                    <th> Status</th>
                                    <td>
                                        <select name="status">
                                            <option>{{$data->status}}</option>
                                            <option>@if($data->status=="True")
                                                    False
                                                @else
                                                    True
                                                @endif</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="col-12">
                                            <button class="btn btn-danger" type="submit">Update Review</button>
                                        </div>
                                    </td>
                                </tr>

                                </thead>
                                <tbody>

                            </table>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!--end page wrapper -->
