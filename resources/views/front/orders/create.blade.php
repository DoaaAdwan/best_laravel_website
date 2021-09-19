@section('titlepage', 'قدم طلبك| برايفت ليبل')

@extends('front.layouts.master')
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>اطلب الآن</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active">  اطلب الآن </li>
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

    <div class="col-lg-6">
        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
</div>


<form action="{{route('store.save',$product->slug)}}" method="POST">
    @csrf

    <div class="col-xl-7 col-lg-7 col-md-6" style="margin-right: 20%">
        <img style="float: right; margin: 0px 30px 30px 30px;" src="{{asset('uploads/'.$product->product_image)}}" width="300px"  height="300px"/>
        <div class="single-uctuct-details" >

            <h2 style="text-align: right">{{$product->name}}</h2>
            <h5 style="text-align: right"> <del>$ {{$product->regular_price}}	₪</del> {{$product->sale_price}}	₪</h5>
            <p class="available-stock" style="text-align: right"><span>أكثر من  {{$product->quantity}} متاحة</span>
                <p>
                    <h4 style="text-align: right;">الوصف:</h4>
                    <p style="text-align: right">{{$product->description}} </p>
                </div>
    </div>

    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">

    <div class="col-4 align-items-center" style="margin-right: 35%">

        <div class="form-group">

            <select class="form-control @error('quantity') is-invalid @enderror"  name="size_id" >
                <option disabled selected name="size_id">اختر الحجم</option>
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

        <div class="form-group" style="text-align: right">
            <label for="text"> اكتب ملاحظاتك</label>
            <textarea name="text" id="" cols="30" rows="10" class="form-control" placeholder="اكتب ملاحظاتك"></textarea>
        </div>


        {{-- choose multiple size at once--}}
        {{-- <select class="form-control sizes @error('quantity') is-invalid @enderror"  name="sizes[]" multiple="multiple">
            <option disabled  name="size_id">اختر الحجم</option>
            @foreach ($sizes as $size)
            <option name="size_id"value="{{$size->id}}">{{$size->name}}</option>
            @endforeach
        </select>
        @error('size_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror  --}}





    <div class="form-group" style="text-align: right">
        <label for="quantity">الكمية</label>
        <input type="text" id="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="الكمية" name="quantity">
        @error('quantity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="form-group" style="text-align: right">
        <label for="address">العنوان</label>
        <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="العنوان" name="address">
        @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="form-group" style="text-align: right">
        <label for="phone">رقم الجوال</label>
        <input type="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="رقم الجوال" name="phone">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="form-group">

        {{-- <input type="hidden" name="status_order" id="status_order" value="جديد"> --}}
    </div>




    <button class="btn btn-success px-5 btn-md" style="background-color: #d33b33; border-color: #d33b33; margin-bottom: 50px; margin-left: 40%">حفظ</button>
</form>


    </div>
</div>

@stop

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.sizes').select2();
});
</script>
@endsection
