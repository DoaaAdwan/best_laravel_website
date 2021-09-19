
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">كل المنتجات</h1>
                </div>
                <div class="pull-right" style="margin-bottom: 20px" >
                    <a class="btn btn-success" href="{{ route('admin.products.create') }}"> أضف منتج جديد</a>
                    <a class="btn btn-info" href="{{ route('index') }}"><i class="fas fa-eye"></i> معاينة</a>


                </div>

                <style>
                    .table td, .table th {vertical-align: middle}
                </style>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        <table class="table table-hover" id="categoryTbl">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>الرقم</th>
                                    <th>اسم المنتج</th>
                                    <th>وصف قصير</th>
                                    <th>تصنيف المنتج</th>
                                    <th>حالة المنتج</th>
                                    <th>السعر العادي</th>
                                    <th>الصورة</th>
                                    <th>الحجم</th>
                                    <th>التاريخ</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{ ($product->category) ? $product->category->name : 'Uncategories' }}</td>
                                    <td>{{ ($product->status) ? $product->status->name : 'متوفر' }}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td><img src="{{asset('uploads/'.$product->product_image)}}" width="100" alt=""></td>
                                    <td>{{ ($product->size) ? $product->size->name : 'M' }}</td>
                                <td>{{$product->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.products.show',$product->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="d-inline" action="{{route('admin.products.destroy',$product->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('هل أنت متأكد من أنك تريد حذف هذا العنصر؟')" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>
                                        </form>

                                    </td>

                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


