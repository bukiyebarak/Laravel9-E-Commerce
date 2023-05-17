<div class="modal fade text-left" id="exampleSmallModal{{$rs->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Role Edit')</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="{{route('admin_role_update',['id'=>$dataRole->id])}}" method="post">
                        @csrf
                        @method('PUT')
                    <div class="col-sm-12 col-md-12 col-12">
                        <div class="form-group">
                            <label for="name">@lang('Name'):</label>
                            <input type="text" id="name" name="role" value="{{$dataRole->name}}" class="form-control" autocomplete="off">
                        </div>
                    </div>
                        <div class="col-12">
                            <button class="btn bg-danger" type="submit" style="margin: 10px;float: right ">@lang('Güncelle')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
