@section('titlepage', 'حسابي| برايفت ليبل')

@extends('front.layouts.master')
 @section('content')

 <!-- Start All Title Box -->
 <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>حسابي</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">التسوق</a></li>
                    <li class="breadcrumb-item active">حسابي</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->


<!-- Start My Account  -->
<div class="my-account-box-main">
    <div class="container">
        <div class="my-account-page">
            <div class="row" >
                <div class="col-lg-6 col-md-12" >
                    <div class="account-box" >
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="{{route('store.myOrders')}}"> <i class="fa fa-gift"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4>طلباتك</h4>
                                <p>اطلع على طلباتك، أو اطلب مرة أخرى</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="account-box" >
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="{{route('store.editUser', Auth::user()->id)}}"><i class="fa fa-lock"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4>تسجيل الدخول &amp; الأمان</h4>
                                <p>عدل بياناتك</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>
<!-- End My Account -->

@stop
