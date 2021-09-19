
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">تعديل بيانات المعرض</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.partners.update', $partner->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">الاسم</label>
                            <input type="text" id="name" class="form-control" placeholder="الاسم" name="name" value="{{$partner->name}}">
                        </div>

                        <div class="form-group">
                            <label for="information">المعلومات</label>
                            <textarea name="info" id="information" cols="30" rows="10" class="form-control" placeholder="المعلومات">{{$partner->info}}</textarea>
                        </div>


                        <div class="form-group">
                            <label for="facebook_link"> رابط الفيسبوك</label>
                            <input type="text" id="facebook_link" class="form-control" placeholder="رابط الفيسبوك" name="facebook_link" value="{{$partner->facebook_link}}">
                        </div>

                        <div class="form-group">
                            <label for="instgram_link">رابط الانستجرام </label>
                            <input type="text" id="instgram_link" class="form-control" placeholder="رابط الانستجرام" name="instgram_link" value="{{$partner->instgram_link}}">
                        </div>

                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" id="image" class="form-control" name="image">
                            <img src="{{asset('uploads/'. $partner->image)}}" alt="" width="150px">
                        </div>


                        <button class="btn btn-info px-5 btn-lg">تعديل</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


