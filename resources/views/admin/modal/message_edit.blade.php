<div class="modal fade text-left" id="exampleModal{{$rs->id}}" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang("Message Edit")</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin_message_update',['id'=>$dataMessage->id])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <label for="name">@lang("Name Surname")</label>
                            <input id="name" type="text" name="name"
                                   value="{{$dataMessage->user->name}} {{$dataMessage->user->surname}}"
                                   class="form-control" disabled>
                        </div>
                        <div class="col-sm-6 col-md-6">
                                <label for="id">Id</label>
                                <input id="id" type="text" name="title" value="{{$dataMessage->id}}" class="form-control"
                                       disabled>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="ip">IP</label>
                            <input id="ip" type="text" name="phone" disabled value="{{$dataMessage->ip_address}}"
                                   class="form-control">
                        </div>

                        <div class="col-sm-6 col-md-6">
                                <label for="phone">@lang("Phone")</label>
                                <a href="tel:+01321654214"><input id="phone" type="text" name="phone" disabled
                                                                  value="{{$dataMessage->phone}}" class="form-control"></a>
                        </div>
                        <div class="col-sm-6 col-md-6">
                                <label for="email">@lang("Email")</label>
                                <a href="tel:+01321654214"><input id="email" type="text" name="email" disabled
                                                                  value="{{$dataMessage->email}}" class="form-control"></a>
                        </div>
                        <div class="col-sm-6 col-md-6">
                                <label for="date">@lang("Created Date")</label>
                                <input id="date" type="text" name="created_at" value="{{$dataMessage->created_at}}"
                                       class="form-control"
                                       disabled>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="date1">@lang("Updated Date")</label>
                            <input id="date1" type="text" name="created_at" value="{{$dataMessage->updated_at}}"
                                   class="form-control"
                                   disabled>
                        </div>
                        <div class="col-md-12">
                                <label for="subject">@lang("Subject")</label> <input id="subject" type="text" name="phone" disabled value="{{$dataMessage->message}}"
                                                              class="form-control">
                        </div>
                        <div class="col-md-12">
                                <label for="message">@lang("Message")</label>
                                <textarea id="message" type="text" name="phone" disabled value=""
                                          class="form-control">{{$dataMessage->subject}}</textarea>
                            <br></div>
                        <div class="col-md-12">
                            <label for="note">@lang("Admin Note")</label>
                            @if(empty($dataMessage->note))
                                <textarea id="note" name="note" cols="30" rows="5" class="form-control"
                                          placeholder="Write your message..."></textarea>
                            @else
                                <textarea id="note" name="note" cols="30" rows="5"
                                          required data-error="Please enter your message"
                                          class="form-control"
                                >{{$dataMessage->note}}</textarea>
                            @endif
                            <br>
                        </div>
                        <div class="col-md-12 ">
                            <label for="status">@lang("Status")</label>
                            <br>
                            <select id="status" class="form-select form-select mb-3" aria-label=".form-select-lg example"
                                    name="status">
                                <option selected>{{$dataMessage->status}}</option>
                                <option>@if($dataMessage->status=="New")
                                        @lang("Read")
                                    @else
                                        @lang("New")
                                    @endif</option>

                            </select> <br><br>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">@lang("Update Message")</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang("Close")</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

