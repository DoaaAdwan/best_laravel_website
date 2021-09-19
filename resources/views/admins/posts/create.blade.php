
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">أضف منشور</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.posts.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">العنوان</label>
                            <input type="text" id="title" class="form-control" placeholder="Title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" id="image" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label for="body">المحتوى</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Body"></textarea>
                        </div>
                        <button class="btn btn-success px-5 btn-lg">حفظ</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


