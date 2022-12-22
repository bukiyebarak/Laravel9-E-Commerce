@php
    $setting=\App\Http\Controllers\HomeController::getsetting()
@endphp
@extends('layouts.home')

@section('title', $setting->title)
@section('description')
    {{$setting->description}}
@endsection
@section('keywords',$setting->keywords)

@section('content')
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>İletişim</h2>
                <ul>
                    <li><a href="{{route('home')}}">Anasayfa</a></li>
                    <li>İletişim</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- End Page Title -->
    <!-- Start Customer Service Area -->
    <section class="customer-service-area ptb-100">
        <div class="container">
            <div class="customer-service-content">
                <div class="row">
                    <div class="col-md-5">
                        <h4 style="text-align: center">İletişim Bilgileri</h4>
                        {!! $setting->contact !!}
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="contact-form">
                            <h3 style="text-align: center">İletişim Formu</h3>
                            <p>Tüm sorularınızı yanıtlamaktan veya size bir tahminde bulunmaktan mutluluk duyarız.
                                Aklınıza takılan sorular için aşağıdaki formdan bize mesaj göndermeniz yeterli.</p>

                            <form action="{{route('sendmessage')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>İsim & Soyisim <span>*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   data-error="Please enter your name" value="{{old('name')}}" placeholder="İsminizi ve soyadınızı giriniz">
                                            <div class="help-block with-errors"></div>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Email <span>*</span></label>
                                            <input type="text" name="email" value="{{old('email')}}"  class="form-control"
                                                   data-error="Please enter your email"
                                                   placeholder="Email Adresiniz">
                                            <div class="help-block with-errors"></div>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Telefon Numarası <span>*</span></label>
                                            <input type="text" name="phone" value="{{old('phone')}}"
                                                   class="form-control"
                                                   data-error="Please enter your phone number"
                                                   placeholder="Telefon Numarası">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Konu <span>*</span></label>
                                            <input type="text" name="subject" value="{{old('subject')}}"  class="form-control"
                                                   data-error="Please enter your name" placeholder="Konu">
                                            @if ($errors->has('subject'))
                                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                                            @endif
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Mesajınız <span>*</span></label>
                                            <textarea name="message" id="message" cols="30" rows="5"
                                                      data-error="Please enter your message" class="form-control"
                                                      placeholder="Write your message...">{{old('message')}}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="text-danger">{{ $errors->first('message') }}</span>
                                            @endif
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        @auth
                                            <button type="submit" class="default-btn">Gönder</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        @else
                                            <a href="/login" class="default-btn"> Please Login</a>
                                        @endauth

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Customer Service Area -->
    <!-- Map -->
    <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1585449.2119492316!2d33.14399446562884!3d39.09325230582152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b0155c964f2671%3A0x40d9dbd42a625f2a!2zVMO8cmtpeWU!5e0!3m2!1str!2str!4v1671699123404!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </div>
    <br> <br>
    <!-- End Map -->
@endsection
