@section('titlepage', 'عدل بياناتك | برايفت ليبل')

@extends('front.layouts.master')
@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2> تعديل البيانات </h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active">  تعديل البيانات </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800" style="text-align: center; margin-top: 20px; margin-right: 47%">عدل بياناتك</h1>
    </div>




<!-- Content Row -->
<div class="row">

    @if(Session::has('error'))
<div class="alert alert-danger">
    {{Session::get('error')}}
</div>
@endif


<form action="{{route('store.updateUser', Auth::user()->id)}}" method="POST">
    @csrf


    <div class="col-4 align-items-center" style="margin-right: 35%">


    <div class="form-group">

        <input type="text" id="name" class="form-control" placeholder="الاسم" name="name" value="{{$user->name}}">
    </div>
    <div class="form-group">

        <input type="text" id="email" class="form-control" placeholder="البريد الإلكتروني" name="email" value="{{$user->email}}">
    </div>
    {{-- <div class="form-group">

        <input type="phone" id="phone" class="form-control" placeholder="رقم الجوال" name="phone" value="{{$order->phone}}">
    </div> --}}
    <button class="btn btn-success px-5 btn-md" style="background-color: #138496; border-color: #138496; margin-bottom: 50px; margin-left: 40%; color: white">تعديل</button>
</form>


    </div>
</div>

@stop
