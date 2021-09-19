
@section('titlepage', 'تأكيد الطلب| برايفت ليبل')
@extends('admins.layouts.master')
@section('content')

<style>
    .back{
        float:left;
        background:#d33b33;
        background-color: #138496;
        border-color: #138496;
        margin-bottom: 200px;
        color: white;
        margin-left: 900px;
        /* margin-top: 50px */
    }
</style>
<div class="col-lg-6">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
<!-- Start Contact Us  -->
<div class="contact-box-main">
    <div class="container">
        <div class="row" style="margin-top: 100px">
            <div class="col-lg-12 col-md-12">
                <div class="contact-info-left" style="background-color: #E5EAEC; height: 600px; width: 1100px; padding:50px" >
                    <h2 style="text-align: center">معلومات الطلب</h2>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p> --}}
                    <ul>
                        <img src="{{asset('uploads/'.$order->product_image)}}" style="width: 300px; height: 400px; float: left;" alt="{{$order->product_name}}">
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
                            <p style="text-align: right"><span style="font-weight: bold">ملاحظات: </span>{{$order->text}}</p>
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
                            <p style="text-align: right"><span style="font-weight: bold">إجمالي سعر الطلب: </span>{{$order->total_order}}₪</p>
                        </li>
                        <li>
                        <form action="{{route('admin.update',$order->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <div >
                            <label><span style="font-weight: bold">حالة الطلب: </span></label>
                            <select  name="status_order" id="status_order" style="width: 200px; height: 30px;">
                                <option disabled selected>حالة الطلب</option>
                                <option value="جديد" @if($order->status_order == "جديد") selected @endif>جديد</option>
                                <option value="معلق" @if($order->status_order == "معلق") selected @endif>معلق</option>
                                <option value="قيد المتابعة" @if($order->status_order == "قيد المتابعة") selected @endif>قيد المتابعة</option>
                                <option value="مكتمل" @if($order->status_order == "مكتمل") selected @endif>مكتمل</option>
                            </select>
                            <button class="btn btn-info" type="submit">تحديث</button>
                        </div>
                        </form>
                    </li>

                    </ul>



                <a class="btn hvr-hover back" data-fancybox-close=""  href="{{route('admin.show')}}"> الرجوع</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



@stop
