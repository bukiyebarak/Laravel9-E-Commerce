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

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="card">
        <div class="card-body">
            @include('sweetalert::alert')
            <h4 class="mb-0">Message Detail</h4>

            <hr/>
            <div class="row gy-3">
                <div class="col-md-12">
                    <form class="row g-3 needs-validation" novalidate=""
                          action="{{route('admin_message_update',['id'=>$data->id])}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <td>{{$data->id}}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <th>IP</th>
                                    <td>{{$_SERVER['REMOTE_ADDR']}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$data->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Subject</th>
                                    <td>{{$data->subject}}</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>{{$data->message}}</td>
                                </tr>
                                <tr>
                                    <th>Admin Note</th>
                                    @if(empty($data->note))
                                        <td> <textarea name="note" cols="30" rows="5" class="form-control"
                                                       placeholder="Write your message..."></textarea>
                                        </td>

                                    @else
                                        <td> <textarea name="note" cols="30" rows="5"
                                                       required data-error="Please enter your message"
                                                       class="form-control"
                                            >{{$data->note}}</textarea>

                                        </td>

                                @endif

                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Update Message</button>
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
