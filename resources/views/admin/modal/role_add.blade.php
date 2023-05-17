<div class="modal fade text-left" id="exampleLargeModal" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-m" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang("Rol Ekle")</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('role_store')}}" method="post" >
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-12 col-12 col-md-12 col-sm-12" style="margin-bottom: 20px" >
                            <label for="role_name" >@lang('İsim'):</label>
                            <input id="role_name" class="form-control" type="text" name="role" value="{{old('role')}}" autocomplete="off"
                                  >
                            @if ($errors->has('role'))
                                <span class="text-danger" style="font-size: 14px; padding-left: 10px">{{ $errors->first('role') }}*</span>
                            @endif
                        </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit"
                                style="margin: 10px 0 10px 10px;
                                 background-color: rgb(135,51,254); border-style: none; color: white">
                            @lang('Rol Ekle')
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang("Close")</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
