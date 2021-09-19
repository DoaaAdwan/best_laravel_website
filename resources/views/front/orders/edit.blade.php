@section('titlepage', 'قدم طلبك| برايفت ليبل')

@extends('front.layouts.master')
@section('content')

<div class="row">

    <div class="col-lg-6">
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
</div>



<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2> تعديل الطلب</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active">  تعديل الطلب </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="text-align: center; margin-top: 20px; margin-right: 47%">اطلب الآن</h1>
    </div>




<!-- Content Row -->
<div class="row">



<form action="{{route('store.edit',$product->slug)}}" method="POST">
    @csrf

    <div class="col-xl-7 col-lg-7 col-md-6" style="margin-right: 20%">
        <img style="float: right; margin: 0px 30px 30px 30px;" src="{{asset('uploads/'.$product->product_image)}}" width="300px"  height="300px"/>
        <div class="single-uctuct-details" >

            <h2 style="text-align: right">{{$product->name}}</h2>
            <h5 style="text-align: right"> <del>$ {{$product->regular_price}}</del> {{$product->sale_price}}</h5>
            <p class="available-stock" style="text-align: right"><span>أكثر من  {{$product->quantity}} متاحة  / <a href="#">8 sold </a></span>
                <p>
                    <h4 style="text-align: right;">الوصف:</h4>
                    <p style="text-align: right">{{$product->description}} </p>
                </div>
    </div>

    <div class="col-4 align-items-center" style="margin-right: 35%">

        <div class="form-group">

            <select class="form-control @error('quantity') is-invalid @enderror" name="size_id" value= {{$order->size_id}}>
                <option disabled selected name="size_id" value="{{$order->size_id}}">اختر الحجم</option>
                @foreach ($sizes as $size)
                <option name="size_id"value="{{$size->id}}">{{$size->name}}</option>

                @endforeach

            </select>

            @error('size_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


    <div class="form-group" style="align-items: right">

        <input type="text" id="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="الكمية" name="quantity" value="{{$order->quantity}}">
        @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    <div class="form-group">

        <input type="text" id="address" class="form-control  @error('address') is-invalid @enderror" placeholder="العنوان" name="address" value="{{$order->address}}">
    </div>
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    <div class="form-group">

        <input type="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="رقم الجوال" name="phone" value="{{$order->phone}}">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group" style="text-align: right">
        <label for="text"> اكتب ملاحظاتك</label>
        <textarea name="text" id="" cols="30" rows="10" class="form-control" placeholder="اكتب ملاحظاتك">{{$order->text}}</textarea>
    </div>
    <button class="btn btn-success px-5 btn-md" style="background-color: #138496; border-color: #138496; margin-bottom: 50px; margin-left: 40%; color: white">تعديل</button>
</form>


    </div>
</div>

@stop
