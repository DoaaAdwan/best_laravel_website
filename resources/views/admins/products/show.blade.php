
@extends('admins.layouts.master')
@section('content')

<style>
    .label{
        color: black;
        font-weight: bold
    }

    </style>

            <!-- Begin Page Content -->
            <div class="container-fluid" >
                <div class="d-sm-flex align-items-center justify-content-between mb-4" >
                    <h1 class="h3 mb-0 text-gray-800">تفاصيل المنتج</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12" style=" background-color: #E5EAEC; padding-right: 100px; padding-top: 50px; padding-bottom: 50px" >
                        @include('admins.includes.errors')
                        <form action="{{route('admin.products.update', $product->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title" class="label">اسم المنتج:</label>
                            <p>{{$product->name}}</p>
                        </div>

                        <div class="form-group">
                            <label for="title" class="label"> تصنيف المنتج:</label>
                            <P>{{$product->category->name}}</P>


                        </div>


                        <div class="form-group">
                            <label for="short_description" class="label">وصف قصير: </label>
                            <p>{{$product->short_description}}</p>
                        </div>
                        <div class="form-group">
                            <label for="short_description" class="label">الوصف:</label>
                            <p>{{$product->description}}</p>
                        </div>

                        <div class="form-group">
                            <label for="regular_price" class="label">السعر العادي:</label>
                            <p>{{$product->regular_price}}</p>
                        </div>

                        <div class="form-group">
                            <label for="sale_price" class="label">سعر البيع:</label>
                            <p>{{$product->sale_price}}</p>
                        </div>

                        <div class="form-group">
                            <label for="product_image" class="label">الصورة:</label>
                            <br>
                            <img src="{{asset('uploads/'. $product->product_image)}}" alt="" width="150px">
                        </div>




                        <div class="form-group">
                            <label class="label">حالة المنتج:</label>
                            <p>{{$product->status->name}}</p>
                        </div>

                        <div class="form-group">
                            <label class="label">الحجم:</label>
                            <p>{{$product->size->name}}</p>
                        </div>

                        <div class="form-group">
                            <label class="label">مميز:</label>
                            <P>{{$product->featured->name}}</P>
                        </div>

                        <div class="form-group">
                            <label class="label">الأكثر رواجاً</label>
                            <p>{{$product->popular->name}}</p>
                        </div>
                        {{-- <div class="form-group">
                            <label class="label">وصل حديثاً</label>
                            <p>{{$product->newArrival->name}}</p>
                        </div> --}}

                        <div class="form-group">
                            <label for="quantity" class="label">الكمية</label>
                            <p>{{$product->quantity}}</p>
                        </div>

                        <a href="{{route('admin.products.index')}}" class="btn btn-info px-5 btn-lg">رجوع</a>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


