
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">أضف منتج جديد</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.products.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">اسم المنتج</label>
                            <input type="text" id="name" class="form-control" placeholder="اسم المنتج" name="name">
                        </div>
                        <div class="form-group">
                            <label for="title"> تصنيف المنتج</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <?php echo $categories_dropdowns; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="short_description">وصف قصير</label>
                            <textarea name="short_description" id="" cols="10" rows="5" class="form-control" placeholder="وصف قصير"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">الوصف</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="الوصف"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="regular_price">السعر العادي</label>
                            <input type="text" id="regular_price" class="form-control" placeholder="السعر العادي" name="regular_price">
                        </div>
                        <div class="form-group">
                            <label for="sale_price">سعر البيع</label>
                            <input type="text" id="sale_price" class="form-control" placeholder=" سعر البيع" name="sale_price">
                        </div>
                        <div class="form-group">
                            <label for="product_image">الصورة</label>
                            <input type="file" id="product_image" class="form-control" name="product_image">
                        </div>
                        {{-- <div class="form-group">
                            <label>تصنيف المنتج</label>
                            <select class="form-control" name="category_id">
                                <option disabled selected name="category_id">اختر تصنيف</option>
                                @foreach ($categories as $category)
                                <option name="category_id"value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div> --}}


                        <div class="form-group">
                            <label>حالة المنتج</label>
                            <select class="form-control" name="status_id">
                                <option disabled selected name="status_id"> حالة المنتج</option>
                                @foreach ($status_product as $status)
                                <option name="status_id"value="{{$status->id}}">{{$status->name}}</option>

                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label>الحجم</label>
                            <select class="form-control" name="size_id">
                                <option disabled selected name="size_id">اختر حجم</option>
                                @foreach ($sizes as $size)
                                <option name="size_id"value="{{$size->id}}">{{$size->name}}</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label>مميز</label>
                            <select class="form-control" name="featured_id">
                                <option disabled selected>مميز</option>
                                @foreach ($featured_products as $featured)
                                <option name="featured_id" value="{{$featured->id}}">{{$featured->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label> الأكثر رواجاً</label>
                            <select class="form-control" name="popular_id">
                                <option disabled selected>الأكثر رواجاً </option>
                                @foreach ($popular_products as $popular)
                                <option name="popular_id" value="{{$popular->id}}">{{$popular->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>وصل حديثاً</label>
                            <select class="form-control" name="newArrival_id">
                                <option disabled selected>وصل حديثاً</option>
                                @foreach ($newArrival_products as $new)
                                <option name="new_id" value="{{$new->id}}">{{$new->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">الكمية</label>
                            <input type="text" id="quantity" class="form-control" placeholder="الكمية" name="quantity">
                        </div>
                        <button class="btn btn-success px-5 btn-lg">حفظ</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


