
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">إضافة تصنيف ملابس</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        @include('admins.includes.errors')
                        <form action="{{route('admin.categories.store')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">الاسم</label>
                            <input type="name" id="name" class="form-control" placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="image">الصورة</label>
                            <input type="file" id="image" class="form-control" name="image">
                        </div>

                        {{-- @dd($levels) --}}
                        <div class="form-group">
                            <select class="form-control" name="parent_id" id="parent_id" >
                                <option value="0">Parent Category</option>

                                @foreach ($levels as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url">الرابط</label>
                            <input type="text" id="url" class="form-control" name="url">
                        </div>


                        <button class="btn btn-success px-5 btn-lg">حفظ</button>
                    </form>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


