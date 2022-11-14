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
            <h4 class="mb-0">User Detail</h4>
            @include('home.message')
            <hr/>
            <div class="row gy-3">
                <div class="col-md-12">
                    <div class="col-md-10">
                        <table class="table-bordered" style="width:100%">
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
                                <th>Roles</th>
                                <td>
                                    <table>
                                        @foreach($data->roles as $row)
                                            <tr>
                                                <td>{{$row->name}}</td>
                                                <td>
                                                    <a href="{{route('admin_user_role_delete',['userid'=>$data->id,'roleid'=>$row->id])}} "
                                                       onclick="return confirm('Delete! Are you sure?')">
                                                        <div class="font-22 text-primary"><i
                                                                class="fadeIn animated bx bx-trash-alt"></i>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>Add Role</th>
                                <td>
                                    <form class="" novalidate=""
                                          action="{{route('admin_user_role_add',['id'=>$data->id])}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <select name="roleid">
                                            @foreach($datalist as $rs)
                                                <option value="{{$rs->id}}">{{$rs->name}}</option>
                                            @endforeach
                                        </select> &nbsp;
                                        <button class="btn btn-info" type="submit">Add Role</button>
                                    </form>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end page wrapper -->
