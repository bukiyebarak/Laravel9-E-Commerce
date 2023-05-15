@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title',__('Yorumlarım'))


@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>@lang("Kullanıcı Yorumları")</h2>
                <ul>
                    <li><a href="{{route('home')}}">@lang("Anasayfa")</a></li>
                    <li>@lang("Kullanıcı Yorumları")</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Customer Service Area -->
    <section class="products-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @include('home.usermenu')
                <div class="col-lg-10 col-md-12">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>@lang("Product")</th>
                                <th>@lang("Subject")</th>
                                <th>@lang("Review")</th>
                                <th>@lang("Rate")</th>
                                <th>@lang("Status")</th>
                                <th>@lang("Date")</th>
                                <th>@lang("Delete")</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datalist as $rs)
                                <tr>
                                    <td>&nbsp;
                                        <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"
                                           target="_blank"> {{$rs->product->title}} </a>
                                    </td>
                                    <td>{{$rs->subject}}</td>
                                    <td>{{$rs->review}}</td>
                                    <td style="width: 120px;">
                                        {{$rs->rate}}&nbsp;
                                        <i class="bx bxs-star @if($rs->rate>=1)text-warning @endif"></i>
                                        <i class="bx bxs-star @if($rs->rate>=2)text-warning @endif"></i>
                                        <i class="bx bxs-star @if($rs->rate>=3)text-warning @endif"></i>
                                        <i class="bx bxs-star @if($rs->rate>=4)text-warning @endif"></i>
                                        <i class="bx bxs-star @if($rs->rate>=5)text-warning @endif"></i>
                                    <td>
                                        @if($rs->status=="True")
                                            <span style="color:darkgreen"><b>{{$rs->status}}</b></span>
                                        @else
                                            <span style="color:darkred"><b>{{$rs->status}}</b></span>
                                        @endif
                                    </td>
                                    <td>{{$rs->created_at}}</td>
                                    <td>
                                        <a href="{{route('user_review_delete',['id'=>$rs->id])}}"
                                           onclick="return confirm('Delete! Are you Sure')">
                                            <div class="font-22 text-primary"><i class="bx bx-trash fs-4"></i>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Customer Service Area -->
@endsection
@section('footerjs')

    <script src="{{asset('assets')}}/admin/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection
