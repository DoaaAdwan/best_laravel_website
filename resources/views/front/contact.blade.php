@section('titlepage', 'التواصل| برايفت ليبل')


@extends('front.layouts.master')
@section('content')

 <!-- Start All Title Box -->
 <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>تواصل معنا</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active"> تواصل معنا </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info-left">
                    <h2 style="text-align: center">معلومات التواصل</h2>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p> --}}
                    <ul>
                        <li>
                            <p style="text-align: right; font-size:18px"><i class="fas fa-map-marker-alt"></i>العنوان:قطاع غزة - رفح <br>حي الشعوت ، الشارع الرئيسي
                                <br> مقابل مسجد علي </p>
                        </li>
                        <li>
                            <p style="text-align: right; font-size:18px"><i class="fas fa-phone-square"></i>رقم الجوال: <a href="tel:+1-888705770">972599321032+</a></p>
                        </li>
                        <li>
                            <p style="text-align: right; font-size: 18px"><i class="fab fa-facebook"></i>الفيسبوك: <a href="https://www.facebook.com/%D8%A7%D8%A8%D9%88-%D9%8A%D9%88%D8%B3%D9%81-%D8%AD%D8%B3%D9%88%D9%86%D8%A9-%D9%88%D8%B4%D8%B1%D9%83%D8%A7%D8%A4%D9%87-%D9%84%D9%84%D8%AC%D9%8A%D9%86%D8%B2-%D9%88%D8%A7%D9%84%D9%85%D9%84%D8%A7%D8%A8%D8%B3-%D8%A7%D9%84%D8%AC%D8%A7%D9%87%D8%B2%D8%A9-1766936843613122">أبو يوسف حسونة وشركاؤه للجينز والملابس المستعملة</a></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="contact-form-right">
                    <h2 style="text-align: center">كن على تواصل</h2>
                    <p style="text-align: center; font-size: 18px">لأي استفسار لا تتردد في التواصل معنا</p>
                    {{-- @if (Session::has('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message_sent')}}
                        </div>
                    @endif --}}

                                <!-- Alert User -->
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                    <form  method="POST" action="{{route('store.send')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="اسمك" required data-error="من فضلك أدخل اسمك">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="إيميلك" id="email" class="form-control" name="email" required data-error="من فضلك أدخل إيميلك">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="الموضوع" required data-error="من فضلك أدخل الموضوع">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" placeholder="رسالتك" rows="4" data-error="اكتب رسالتك" required name="message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                {{-- <div class="submit-button text-center">
                                    <button class="btn hvr-hover" id="submit" type="submit">أرسل الرسالة</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div> --}}
                                <div class="submit-button text-center">

     <button type="submit" class="btn btn-primary btn hvr-hover" style=" background: #d33b33; "> أرسل الرسالة </button>
                            </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->
@stop
