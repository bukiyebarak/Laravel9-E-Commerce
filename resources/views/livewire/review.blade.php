<div>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <form wire:submit.prevent="store">
        @csrf
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <input type="text" wire:model="subject"
                           placeholder="Enter your review a title"
                           class="form-control">
                    @error('subject')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                    <textarea wire:model="review" cols="30" rows="6"
                              placeholder="Write your comments here"
                              class="form-control"></textarea>
                        @error('review')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>
                <br>
                <div class="col-lg-12 col-md-12">
                    <label>Rating (1-5)</label>
                    @error('rate')<span class="text-danger">{{$message}}</span>@enderror
                    <div class="review-title">
                        <div class="rating">
                            1 <input type="radio" wire:model="rate" value="1"/>
                            2 <input type="radio" wire:model="rate" value="2"/>
                            3 <input type="radio" wire:model="rate" value="3"/>
                            4 <input type="radio" wire:model="rate" value="4"/>
                            5 <input type="radio" wire:model="rate" value="5"/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-lg-12 col-md-12">
                    @auth
                        <button type="submit" class="default-btn">Submit Review</button>
                    @else
                        <a href="/login" class="default-btn"> Please Login</a>
                    @endauth
                </div>
            </div>
    </form>

</div>
