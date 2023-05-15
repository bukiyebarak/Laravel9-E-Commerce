<div class="modal fade" id="exampleScrollableModal{{$rs->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{$data->title}} </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form action="{{route('admin_image_store',['product_id'=>$data->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label for="title" >@lang("Title")</label>
                            <input id="title" type="text" name="title" class="form-control" value="{{old('title')}}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <label for="image">@lang("Image")</label>
                            <input id="image" type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>

                        <div class="col-sm-6 col-md-6"><br>
                            <button type="submit" class="btn btn-primary">@lang("Update Image")</button>
                        </div>
                    </div>
                    <br>
                </form>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-body">
                            <div class="text-danger rounded">@lang("Product Image(s)")</div>
                        </div>
                    </div>
                </div>
                @foreach($images as $rs)
                    <div class="row"><br>
                        <div class=" col-md-12">
                            <p>
                                @if($rs->image)
                                    <img src="{{asset('images/'.$rs->image)}}" height="60" alt="">&nbsp;
                                @endif
                                <b>ID:</b> {{$rs->id}}  <b>@lang("Title"):</b> {{$rs->title}} &nbsp;
                                    <a href="{{route('admin_image_delete',['id'=>$rs->id, 'product_id'=>$data->id])}} "
                                   class="text-danger btn bg-light-danger border-0 "
                                   onclick="return confirm('Delete! Are you Sure')"><i
                                        class="bx bxs-trash fs-6"></i></a>
                            </p><br>
                        </div>
                        @endforeach
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang("Close")</button>
            </div>
        </div>
    </div>
</div>

