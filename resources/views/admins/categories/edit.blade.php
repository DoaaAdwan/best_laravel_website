
@extends('admins.layouts.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">تعديل تصنيف المنتج</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            @include('admins.includes.errors')
            <form action="{{ route('admin.categories.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>اسم التصنيف</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $categoryDetails->name }}">
                </div>

                <div class="form-group">
                    <select name="parent_id" id="parent_id" class="form-control" value={{$categoryDetails->parent_id}}>
                        <option value="0">التصنيف الأب</option>

                        @foreach ($levels as $val)
                        <option value="{{$val->id}}" @if($val->id == $categoryDetails->parent_id) selected @endif>{{$val->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="url">الرابط</label>
                    <input type="text" id="url" class="form-control" name="url" value="{{$categoryDetails->url}}">
                </div>

                <div class="form-group">
                    <label for="image">الصورة</label>
                    <input type="file" id="image" class="form-control" name="image">
                    <img src="{{asset('uploads/'. $categories->image)}}" alt="" width="150px">
                </div>

                <button class="btn btn-info px-5 btn-lg">تعديل</button>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
@stop


