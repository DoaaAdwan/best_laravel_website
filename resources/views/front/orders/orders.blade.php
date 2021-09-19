
@extends('front.layouts.master')
@section('content')

<style>
    .page-item.active .page-link{
        background-color: #d33b33;
        border-color: #d33b33;
        color:white;
    }
    .page-link{
        color:black;
    }
</style>

<style>
    .table td, .table th {vertical-align: middle}
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
            <!-- Begin Page Content -->
            <div class="container-fluid">

                    <h1 class="h3 text-gray-800" style="text-align: center; margin-top: 20px">كل الطلبات</h1>

                <div class="pull-right" style="margin-bottom: 20px" >
                    {{-- <a class="btn btn-success" href="{{ route('store.create',$products->slug) }}"> أضف طلب جديد</a> --}}
                    {{-- <a class="btn btn-info" href="{{ route('index') }}"><i class="fas fa-eye"></i> معاينة</a> --}}


                </div>

                <div class="col-lg-12" style="text-align: center">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
        </div>


               <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    {{-- <th>صورة المنتج</th> --}}
                                    <th>اسم المنتج</th>

                                    <th>الكمية</th>
                                    <th>إجمالي الطلب</th>
                                    <th> حالة الطلب</th>
                                    <th>تاريخ الطلب</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    {{-- <td class="thumbnail-img">
                                        <a href="#">
                                        <td><img src="{{asset('uploads/'.$order->products->product_image)}}" width="100" alt=""></td>
								</a>
                                    </td> --}}
                                    <td class="name-pr">
                                        <a href="#">
									{{$order->product_name}}
								</a>
                                    </td>

                                    <td class="quantity-box">{{$order->quantity}}</td>
                                    <td class="total-pr">
                                        <p>{{$order->total_order}}	₪</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>{{$order->status_order}}</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>{{date('d-m-y'),strtotime($order->created_at)}}</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{route('store.editOrder',$order->id)}}" class="btn btn-primary btn-md">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{route('store.orderDetails',$order->id)}}" class="btn btn-primary btn-md">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <form class="d-inline" action="{{route('store.orders.destroy',$order->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('هل أنت متأكد من أنك تريد حذف هذا الطلب؟')" class="btn btn-danger btn-md"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$orders->links()}}
                </div>
            </div>
            </div>
            <!-- /.container-fluid -->
@stop


