
@extends('admins.layouts.master')
@section('content')


<!-- End All Title Box -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 text-gray-800" style="text-align: center; margin-top: 20px">كل الطلبات</h1>
                </div>
                <div class="pull-right" style="margin-bottom: 20px" >
                    {{-- <a class="btn btn-success" href="{{ route('store.create',$products->slug) }}"> أضف طلب جديد</a> --}}
                    {{-- <a class="btn btn-info" href="{{ route('index') }}"><i class="fas fa-eye"></i> معاينة</a> --}}


                </div>

               <!-- Start Cart  -->
               <style>
                .table td, .table th {vertical-align: middle}
            </style>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table table-hover" id="categoryTbl">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>الرقم</th>
                                    {{-- <th>صورة المنتج</th> --}}
                                    <th>اسم المنتج</th>
                                    <th>الصورة</th>
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
                                    <td><img src="{{asset('uploads/'.$order->product_image)}}" width="100" alt=""></td>

                                    <td class="quantity-box">{{$order->quantity}}</td>
                                    <td class="total-pr">
                                        <p>{{$order->total_order}}</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>{{$order->status_order}}</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>{{date('d-m-y'),strtotime($order->created_at)}}</p>
                                    </td>
                                    <td class="remove-pr">

                                        <a href="{{route('admin.orderDetails',$order->id)}}" class="btn btn-primary btn-md">
                                            <i class="fas fa-info-circle"></i>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.container-fluid -->
@stop


