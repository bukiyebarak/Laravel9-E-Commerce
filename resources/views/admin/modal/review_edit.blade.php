<div class="modal fade text-left" id="exampleLargeModal{{$rs->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Review Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                {{--                    <span aria-hidden="true">&times;</span>--}}
            </div>
            <div class="modal-body">
                <form action="{{route('admin_review_update',['id'=>$data->id])}}" method="post" >
                    @csrf
                    <div class="row">

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Id</label>
                                <input type="text" name="title" value="{{$data->id}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label> Name- Surname</label>
                                <input type="text" name="title" value="{{$data->user->name}} {{$data->user->surname}}"
                                       class="form-control" disabled>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Product</label>
                                <input type="text" name="title" value="{{$data->product->title}}" class="form-control"
                                       disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="title"
                                       value="{{$data->subject}}" disabled
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Review</label>
                                <input type="text" name="phone" disabled value="{{$data->review}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Rate</label> &nbsp;
                                <i class="bx bxs-star text-secondary @if($rs->rate>=1)text-warning @endif"></i>
                                <i class="bx bxs-star @if($rs->rate>=2)text-warning @endif"></i>
                                <i class="bx bxs-star @if($rs->rate>=3)text-warning @endif"></i>
                                <i class="bx bxs-star @if($rs->rate>=4)text-warning @endif"></i>
                                <i class="bx bxs-star @if($rs->rate>=5)text-warning @endif"></i>
                                <input type="text" name="email" value="{{$data->rate}}" class="form-control" disabled></input>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>IP</label>
                                <input type="text" name="total" value="{{$data->IP}}" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>Created Data</label>
                                <input type="text" name="created_at" value="{{$data->created_at}}" class="form-control"
                                       disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="title">Update Data</label>
                                <input type="text" name="updated_at" value="{{$data->updated_at}}" class="form-control"
                                       disabled>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 ">

                            <label>Status</label>

                            <select class="form-select form-select mb-3" aria-label=".form-select-lg example"
                                    name="status">
                                <option selected="selected">{{$data->status}}</option>
                                <option>@if($data->status=="True")
                                        False
                                    @else
                                        True
                                    @endif</option>
                            </select>
                            <br> <br>
                        </div>

                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary float-end">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


