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
                                            <label>İsim & Soyisim<span>*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   data-error="Please enter your name" placeholder="İsminizi ve soyadınızı giriniz">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Email <span>*</span></label>
                                            <input type="email" name="email"  class="form-control"
                                                   data-error="Please enter your email"
                                                   placeholder="Email Adresiniz">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Telefon Numarası<span>*</span></label>
                                            <input type="text" name="phone"
                                                   class="form-control"
                                                   data-error="Please enter your phone number"
                                                   placeholder="Telefon Numarası">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label>Konu<span>*</span></label>
                                            <input type="text" name="subject"  class="form-control"
                                                   data-error="Please enter your name" placeholder="Konu">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label>Mesajınız<span>*</span></label>
                                            <textarea name="message" id="message" cols="30" rows="5"
                                                      data-error="Please enter your message" class="form-control"
                                                      placeholder="Write your message..."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">Gönder</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                            @include('sweetalert::alert')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Customer Service Area -->
    <!-- Map -->
    <div id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2987.7593473566985!2d-73.78797548432667!3d41.509489596379204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dd490255c9bfa7%3A0xfe099945f43b6e47!2sWonderland%20Dr%2C%20East%20Fishkill%2C%20NY%2012533%2C%20USA!5e0!3m2!1sen!2sbd!4v1622957216342!5m2!1sen!2sbd"></iframe>
    </div>
    <br> <br>
    <!-- End Map -->
@endsection
