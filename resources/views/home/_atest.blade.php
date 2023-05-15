@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Blank Page</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>Blank Page</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Start Customer Service Area -->
    <section class="customer-service-area ptb-100">
        <div class="container">
            <div class="customer-service-content">
                Blank Page
            </div>
        </div>
    </section>
    <!-- End Customer Service Area -->

@endsection
<div class="col-md-122">
    <label>@lang("Title") (@lang("İngilizce"))*</label>
    <input type="text" name="title_en" class="form-control" value=" {{old('title')}}" >
    @if ($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif
</div>
<div class="col-md-12">
    <label>@lang("Keywords") (@lang("İngilizce"))*</label>
    <input type="text" name="keywords_en" class="form-control" value=" {{old('keywords')}}" >
    @if ($errors->has('keywords'))
        <span class="text-danger">{{ $errors->first('keywords') }}</span>
    @endif
</div>
<div class="col-md-12">
    <label>@lang("Description") (@lang("İngilizce")) *</label>
    <input type="text" name="description_en" class="form-control"  value=" {{old('description')}}" >
    @if ($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
    @endif
</div>
<div class="col-md-12">
    <label for="summernote1">@lang("Detail") (@lang("İngilizce"))*</label>
    <textarea id="summernote1" name="detail_en">{{old('detail')}}</textarea>
    <script>
        $('#summernote1').summernote1({
            placeholder: __('Category Detail English '),
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
    @if ($errors->has('detail'))
        <span class="text-danger">{{ $errors->first('detail') }}</span>
    @endif
</div>
