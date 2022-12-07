<div class="modal fade text-left" id="exampleModal{{$rs->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Message Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form action="{{route('admin_message_update',['id'=>$dataMessage->id])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                                <label>Id</label>
                                <input type="text" name="title" value="{{$dataMessage->id}}" class="form-control"
                                       disabled>
                        </div>
                        <div class="col-sm-6 col-md-6">
                                <label>Name Surname</label>
                                <input type="text" name="title"
                                       value="{{$dataMessage->user->name}} {{$dataMessage->user->surname}}"
                                       class="form-control" disabled>
                        </div>

                        <div class="col-sm-6 col-md-6">
                                <label>Phone</label>
                                <a href="tel:+01321654214"><input type="text" name="phone" disabled
                                                                  value="{{$dataMessage->phone}}" class="form-control"></a>
                        </div>
                        <div class="col-sm-6 col-md-6">
                                <label>Email</label>
                                <a href="tel:+01321654214"><input type="text" name="phone" disabled
                                                                  value="{{$dataMessage->email}}" class="form-control"></a>
                        </div>
                        <div class="col-sm-6 col-md-6">

                                <label>IP</label>
                                <input type="text" name="phone" disabled value="{{$dataMessage->ip_address}}"
                                       class="form-control">

                        </div>

                        <div class="col-sm-6 col-md-6">
                                <label>Date</label>
                                <input type="text" name="created_at" value="{{$dataMessage->created_at}}"
                                       class="form-control"
                                       disabled>
                        </div>
                        <div class="col-md-12">
                                <label>Subject</label> <input type="text" name="phone" disabled value="{{$dataMessage->message}}"
                                                              class="form-control">

                        </div>
                        <div class="col-md-12">
                                <label>Message</label>
                                <textarea type="text" name="phone" disabled value=""
                                          class="form-control">{{$dataMessage->subject}}</textarea>
                            <br></div>
                        <div class="col-md-12">
                            <label>Admin Note</label>
                            @if(empty($dataMessage->note))
                                <textarea name="note" cols="30" rows="5" class="form-control"
                                          placeholder="Write your message..."></textarea>
                            @else
                                <textarea name="note" cols="30" rows="5"
                                          required data-error="Please enter your message"
                                          class="form-control"
                                >{{$dataMessage->note}}</textarea>
                            @endif
                            <br>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Message</button>

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

