
@section('titlepage', 'تأكيد الطلب| برايفت ليبل')
@extends('front.layouts.master')
@section('content')

<style>

.butto{
    float:right;
    background:#218838;
    background-color: #218838;
    border-color: #218838;
     color: white; margin-left:100px;
     margin-right:350px;
     margin-top: 100px
      /* margin-top: 500px */
}

.but{
    float:right;
    background:#d33b33;
    background-color: #138496;
    border-color: #138496;
    color: white;
    margin-top: 100px;

}
</style>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>طلباتي</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active">  طلباتي </li>
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
            <div class="col-lg-12 col-md-12">
                <div class="contact-info-left">
                    <h2 style="text-align: center">معلومات الطلب</h2>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p> --}}




                    <ul>
                        <img src="{{asset('uploads/'.$order->product_image)}}" style="width: 300px; height: 400px; float: left;" alt="">
                        <li>

                            <p style="text-align: right"><span style="font-weight: bold"> الاسم: </span>{{$order->user_name}}</p>
                        </li>
                        <li>
                            <p style="text-align: right"><span style="font-weight: bold"> الجيميل: </span><a href="mailto:{{$order->user_email}}" target="_blank" rel="noopener noreferrer">{{$order->user_email}}</a></p>
                        </li>
                        <li>
                            <p style="text-align: right"><span style="font-weight: bold">اسم المنتج: </span>{{$order->product_name}}</p>

                        </li>
                        <li>
                            <p style="text-align: right"><span style="font-weight: bold">الوصف: </span>{{$order->product_description}}</p>
                        </li>
                        <li>
                            <p style="text-align: right"><span style="font-weight: bold">الملاحظة: </span>{{$order->text}}</p>
                        </li>

                        <li>
                            <p style="text-align: right"><span style="font-weight: bold">الحجم: </span>{{$order->size->name}}</p>
                        </li>

                        <li>
                            <p style="text-align: right"><span style="font-weight: bold">الكمية: </span>{{$order->quantity}}</p>
                        </li>
                        <li>
                            <p style="text-align: right"><span style="font-weight: bold">العنوان:</span>{{$order->address}}</p>
                        </li>



                        <li>
                            <p style="text-align: right"><span style="font-weight: bold">إجمالي سعر الطلب: </span>{{$order->total_order}}	₪</p>
                        </li>
                    </ul>
                    {{-- <div style="float: left; width: 130px;">
                    <button class="btn btn-success px-5 btn-md" style="background-color: #d33b33; border-color: #d33b33; margin-bottom: auto; margin-left: 40%; display: inline;">تأكيد</button>
                    </div>
                    <div style="float: right; width: 225px">
                    <button class="btn btn-success px-5 btn-md"  style="background-color: #d33b33; border-color: #d33b33; margin-bottom: auto; margin-left: 40%; display: inline;p">رجوع</button>
                </div> --}}
                <div >
                {{-- <button class="btn btn-success px-5 btn-md" style="background-color: #d33b33; border-color: #d33b33; margin-bottom: 50px; margin-left: 45%">تأكيد</button> --}}
                <a onclick="showAlert()" class="btn hvr-hover butto" data-fancybox-close=""  href="{{route('store.myOrders')}}"> تأكيد الطلب</a>
                <a class="btn hvr-hover but" data-fancybox-close=""  href="{{route('store.edit', $product->slug)}}"> تعديل</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showAlert() {
      var myText = "تم إرسال طلبك بنجاح سيتم التواصل معك قريباً";
      alert (myText);
    }
    </script>


@stop
