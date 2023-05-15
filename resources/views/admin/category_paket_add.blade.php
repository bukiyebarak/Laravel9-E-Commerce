@extends('layouts.admin')

@section('title', __('Add Category'))

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">@lang("ADD CATEGORY")</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">@lang("Add Paket Category")</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <span class="float-end">* : @lang("Zorunlu girilmesi gereken yerler")</span>
                    <h4 class="mb-0">@lang("Add Paket Category")</h4>
                    <hr/>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation" novalidate=""
                                  action="{{route('admin_category_paket_store')}}" method="post">
                                @csrf
                                <div class="col-md-122">
                                    <label>@lang("Title") *</label>
                                    <input type="text" name="title" class="form-control" value=" {{old('title')}}" >
{{--                                    @if ($errors->has('title'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('title') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Keywords") *</label>
                                    <input type="text" name="keywords" class="form-control" value=" {{old('keywords')}}" >
{{--                                    @if ($errors->has('keywords'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('keywords') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Description") *</label>
                                    <input type="text" name="description" class="form-control" id="validationCustom02" value=" {{old('description')}}" >
{{--                                    @if ($errors->has('description'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('description') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Slug") *</label>
                                    <input type="text" name="slug" class="form-control" value=" {{old('slug')}}">
{{--                                    @if ($errors->has('slug'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('slug') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>@lang("Status")</label>
                                    <select class="form-select" name="status" >
                                        <option selected="">False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">@lang("Add Paket Category")</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
@endsection
