
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">تعديل المنشور</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.posts.update', $post->id)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="title">العنوان</label>
                            <input type="text" id="title" class="form-control" placeholder="Title" name="title" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" id="image" class="form-control" name="image">
                            <img src="{{asset('uploads/'. $post->image)}}" alt="" width="150px">
                        </div>
                        {{-- <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                <option disabled selected>اختر التصنيف</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    {{$category->id == $post->category_id ? 'selected' : ''}}
                                    >{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div> --}}
                        {{-- <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <input type="text" id="excerpt" class="form-control" placeholder="Excerpt" name="excerpt" value="{{$post->excerpt}}">
                        </div> --}}
                        <div class="form-group">
                            <label for="body">المحتوى</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Body">{{$post->body}}</textarea>
                        </div>
                        <button class="btn btn-info px-5 btn-lg">تعديل</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


