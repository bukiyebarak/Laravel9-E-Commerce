<div class="modal fade text-left" id="exampleLargeModal{{$rs->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang("User Detail")</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" name="title" value="{{$dataUser->id}}" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>@lang("Name Surname")</label>
                            <input type="text" name="title" value="{{$dataUser->name}} {{$dataUser->surname}}"
                                   class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>@lang("Phone")</label>
                            <a href="tel:+01321654214"><input type="text" name="phone" disabled
                                                              value="{{$dataUser->phone}}" class="form-control"></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>@lang("Email")</label>
                            <a href="tel:+01321654214"><input type="text" name="phone" disabled
                                                              value="{{$dataUser->email}}" class="form-control"></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>@lang("Address")</label>
                            <input type="text" name="title" value="{{$dataUser->address}}" class="form-control"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>@lang("Date")</label>
                            <input type="text" name="created_at" value="{{$dataUser->created_at}}" class="form-control"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <br>
                        <div class="row ">
                            <label><b>@lang("Roles")</b><br></label>
                            @foreach($dataUser->roles as $row)
                                <div class="col-md-4">
                                 <a href="{{route('admin_user_role_delete',['userid'=>$dataUser->id,'roleid'=>$row->id])}} "
                                                                          onclick="return confirm('Delete! Are you sure?')">
                                        <div class="font-22 text-black">{{$row->name}} <i
                                                class="fadeIn animated bx bx-trash-alt text-danger"></i>,
                                        </div>
                                    </a></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 ">
                        <br>
                        <form action="{{route('admin_user_role_add',['id'=>$dataUser->id])}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <label>@lang("Status")</label>
                                    <br><select class="form-select form-select mb-3"
                                                aria-label=".form-select-lg example"
                                                name="roleid">
                                        @foreach($datalistUser as $rs)
                                            <option value="{{$rs->id}}">{{$rs->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4" style="margin-top: 20px; text-align: center">
                                    <button type="submit" class="btn btn-danger "> <i class="bx bxs-plus-circle"></i>@lang("Add Role")</button>
                                </div>
                            </div>
                        </form>
                        <br> <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang("Close")</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
