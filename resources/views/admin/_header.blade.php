@php
    $message=\App\Http\Controllers\Admin\HomeController::headerMessage()
@endphp
    <!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu-left d-none d-lg-block">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_messages')}}"><i class='bx bx-message'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin_review')}}"><i class='bx bx-message-detail'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class='bx bx-calendar'></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class='bx bx-check-square'></i></a>
                    </li>
                </ul>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">
                    <input type="text" class="form-control search-control" placeholder="Type to search..."> <span
                        class="position-absolute top-50 search-show translate-middle-y"><i
                            class='bx bx-search'></i></span>
                    <span class="position-absolute top-50 search-close translate-middle-y"><i
                            class='bx bx-x'></i></span>
                </div>
            </div>


            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center">
                    <!--Bildirimler-->
                    <li>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="header-notifications-list">
                            </div>
                        </div>
                    </li>
                    <!--Mesajlat-->
                    <li class="nav-item dropdown dropdown-large">
                        @php
                            $countmessage=\App\Http\Controllers\Admin\HomeController::countMessage()
                        @endphp
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                class="alert-count">{{$countmessage}}</span>
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <h6 class="msg-header-title">Messages</h6>
                                </div>
                            </a>
                            <div class="header-message-list">
                                @foreach($message as $rs)
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <i class="bx bx-user fs-2"></i>
                                            </div>&nbsp;
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">{{$rs->name}} <span class="msg-time float-end">
                                                        {{$rs->created_at}}
                                                    </span></h6>
                                                <p class="msg-info">{{$rs->subject}}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                            <a href="{{route('admin_messages')}}">
                                <div class="text-center msg-footer">View All Messages</div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                   role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bxs-user fs-1" ></i>
{{--                    @if(\Illuminate\Support\Facades\Auth::user()->profile_photo_path)--}}
{{--                        <img--}}
{{--                            src="{{\Illuminate\Support\Facades\Storage::url(\Illuminate\Support\Facades\Auth::user()->profile_photo_path)}}"--}}
{{--                            class="user-img">--}}
{{--                    @endif--}}

                    <div class="user-info ps-3">
                        @auth
                            <p class="user-name mb-0 text-white">{{Auth::user()->name}}</p>
                            <p class="user-name mb-0 text-white">{{Auth::user()->email}}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">

                    <li><a class="dropdown-item" href="{{route('myprofile')}}"><i
                                class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('logout')}}"> <i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                    </li>
                    @endauth

                </ul>
            </div>
        </nav>
    </div>
</header>
<!--end header -->
