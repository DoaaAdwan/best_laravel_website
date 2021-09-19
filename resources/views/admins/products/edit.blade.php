
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">تعديل المنتج</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.products.update', $product->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">اسم المنتج</label>
                            <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{$product->name}}">
                        </div>

                        <div class="form-group">
                            <label for="title"> تصنيف المنتج</label>
                            <select name="category_id" id="category_id" value="{{$product->category_id}}" class="form-control" >
                                <?php echo $categories_dropdowns; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="short_description">وصف قصير </label>
                            <textarea name="short_description" id="" cols="10" rows="5" class="form-control" placeholder="Short Description">{{$product->short_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="short_description">الوصف</label>
                            <textarea name="description" id="" cols="10" rows="5" class="form-control" placeholder="Description">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="regular_price">السعر العادي</label>
                            <input type="text" id="regular_price" class="form-control" placeholder="Regular Price" name="regular_price" value="{{$product->regular_price}}">
                        </div>

                        <div class="form-group">
                            <label for="sale_price">سعر البيع</label>
                            <input type="text" id="sale_price" class="form-control" placeholder="Sale Price" name="sale_price" value="{{$product->sale_price}}">
                        </div>

                        <div class="form-group">
                            <label for="product_image">الصورة</label>
                            <input type="file" id="product_image" class="form-control" name="product_image">
                            <img src="{{asset('uploads/'. $product->product_image)}}" alt="" width="150px">
                        </div>


                        <div class="form-group">
                            <label>حالة المنتج</label>
                            <select class="form-control" name="status_id" value="{{$product->status_id}}">
                                <option disabled selected> حالة المنتج</option>
                                @foreach ($status_product as $status)
                                <option value="{{$status->id}}"
                                    {{$status->id == $product->status_id ? 'selected' : ''}}
                                    >{{$status->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>الحجم</label>
                            <select class="form-control" name="size_id" value="{{$product->size_id}}">
                                <option disabled selected>اختر حجم</option>
                                @foreach ($sizes as $size)
                                <option value="{{$size->id}}"
                                    {{$size->id == $product->size_id ? 'selected' : ''}}
                                    >{{$size->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>مميز</label>
                            <select class="form-control" name="featured_id" value="{{$product->featured_id}}">
                                <option disabled selected>مميز</option>
                                @foreach ($featured_products as $featured)
                                <option name="featured_id" value="{{$featured->id}}"
                                    {{$featured->id == $product->featured_id ? 'selected' : ''}}>{{$featured->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>الأكثر رواجاً</label>
                            <select class="form-control" name="popular_id" value="{{$product->popular_id}}">
                                <option disabled selected> الأكثر رواجاً</option>
                                @foreach ($popular_products as $popular)
                                <option name="popular_id" value="{{$popular->id}}"
                                    {{$popular->id == $product->popular_id ? 'selected' : ''}}>{{$popular->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>وصل حديثاً</label>
                            <select class="form-control" name="newArrival_id" value="{{$product->newArrival_id}}">
                                <option disabled selected>وصل حديثاً</option>
                                @foreach ($newArrival_products as $new)
                                <option name="new_id" value="{{$new->id}}"
                                    {{$new->id == $product->new_id ? 'selected' : ''}}>{{$new->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">الكمية</label>
                            <input type="text" id="quantity" class="form-control" placeholder="الكمية" name="quantity" value="{{$product->quantity}}">
                        </div>

                        <button class="btn btn-info px-5 btn-lg">تعديل</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


