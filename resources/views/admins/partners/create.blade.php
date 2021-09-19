
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">إضافة معرض جديد</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.partners.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" id="name" class="form-control" placeholder="الاسم" name="name">
                        </div>
                        <div class="form-group">
                            <label for="information">المعلومات</label>
                            <textarea name="info" id="information" cols="30" rows="10" class="form-control" placeholder="المعلومات"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="facebook_link">رابط الفيسبوك</label>
                            <input type="text" id="facebook_link" class="form-control" placeholder=" رابط الفيسبوك" name="facebook_link">
                        </div>

                        <div class="form-group">
                            <label for="instgram_link">رابط الانستجرام</label>
                            <input type="text" id="instgram_link" class="form-control" placeholder="رابط الانستجرام" name="instgram_link">
                        </div>

                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" id="image" class="form-control" name="image">
                        </div>

                        <button class="btn btn-success px-5 btn-lg">حفظ</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


