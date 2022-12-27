@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">ADD CATEGORY</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{route('adminhome')}}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Paket Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <span class="float-end">* : Zorunlu girilmesi gereken yerler</span>
                    <h4 class="mb-0">Add Paket Category</h4>
                    <hr/>
                    <div class="row gy-3">
                        <div class="col-md-12">
                            <form class="row g-3 needs-validation" novalidate=""
                                  action="{{route('admin_category_paket_store')}}" method="post">
                                @csrf
                                <div class="col-md-122">
                                    <label>Title *</label>
                                    <input type="text" name="title" class="form-control" value=" {{old('title')}}" >
{{--                                    @if ($errors->has('title'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('title') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>Keywords *</label>
                                    <input type="text" name="keywords" class="form-control" value=" {{old('keywords')}}" >
{{--                                    @if ($errors->has('keywords'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('keywords') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>Description *</label>
                                    <input type="text" name="description" class="form-control" id="validationCustom02" value=" {{old('description')}}" >
{{--                                    @if ($errors->has('description'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('description') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>Slug *</label>
                                    <input type="text" name="slug" class="form-control" value=" {{old('slug')}}">
{{--                                    @if ($errors->has('slug'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('slug') }}</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="col-md-12">
                                    <label>Status</label>
                                    <select class="form-select" name="status" >
                                        <option selected="">False</option>
                                        <option>True</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Add Paket Category</button>
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
