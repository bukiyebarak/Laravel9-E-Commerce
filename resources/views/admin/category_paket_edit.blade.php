@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">EDIT PAKET CATEGORY</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Paket Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">Edit Category</h4>
                    <hr/>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation" novalidate=""
                                  action="{{route('admin_category_paket_update', ['id'=>$data->id])}}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <label>Title*</label>
                                    <input type="text" name="title" value="{{$data->title}}" class="form-control">
{{--                                    @if ($errors->has('title'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('title') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>Keywords*</label>
                                    <input type="text" name="keywords" value="{{$data->keywords}}" class="form-control" >
{{--                                    @if ($errors->has('keywords'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('keywords') }}</span>--}}
{{--                                    @endif --}}
                                </div>
                                <div class="col-md-12">
                                    <label>Description*</label>
                                    <input type="text" name="description"  value="{{$data->description}}" class="form-control" >
{{--                                    @if ($errors->has('description'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('description') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>Slug*</label>
                                    <input type="text" name="slug"  value="{{$data->slug}}" class="form-control">
{{--                                    @if ($errors->has('slug'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('slug') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>Status</label>
                                    <select class="form-select" name="status" required>
                                        <option selected="selected">{{$data->status}}</option>
                                        <option>@if($data->status=="True")
                                                False
                                            @else
                                                True
                                            @endif</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Update Paket Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col-12">
                    <div id="todo-container"></div>
                </div>
            </div>
        </div>
    </div>

    <!--end page wrapper -->
@endsection
