
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">أضف تصنيف صفحة رئيسية جديد</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.home_categories.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Product Category</label>
                            <select class="form-control" name="category_id">
                                <option disabled selected name="category_id">اختر التصنيف</option>
                                @foreach ($categories as $category)
                                <option name="category_id"value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="noOfProducts">عدد المنتجات</label>
                            <input type="text" id="noOfProducts" class="form-control" placeholder="Enter number of Products" name="noOfProducts">
                        </div>
                        <button class="btn btn-success px-5 btn-lg">حفظ</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


