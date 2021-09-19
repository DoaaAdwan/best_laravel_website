
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">إضافة سلايدر جديد</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.home_sliders.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">العنوان</label>
                            <input type="text" id="title" class="form-control" placeholder="العنوان" name="title">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">العنوان الفرعي</label>
                            <input type="text" id="subtitle" class="form-control" placeholder="العنوان الفرعي" name="subtitle">
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" id="image" class="form-control" name="image">
                        </div>

                        {{-- <div class="form-group">
                            <label>الحالة</label>
                            <select class="form-control" name="status">
                                <option disabled selected>الحالة</option>
                                <option value="0">غير فعال</option>
                                <option value="1">فعال</option>
                            </select>
                        </div> --}}


                        <button class="btn btn-success px-5 btn-lg">حفظ</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


