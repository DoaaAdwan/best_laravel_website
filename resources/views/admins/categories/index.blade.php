
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">كل تصنيفات الملابس</h1>
                </div>
                <div class="pull-right" style="margin-bottom: 20px" >
                    <a class="btn btn-success" href="{{ route('admin.categories.create') }}"> إضافة تصنيف ملابس جديد</a>
                    <a class="btn btn-info" href="{{ route('index') }}"><i class="fas fa-eye"></i> معاينة</a>

                    <div style="margin-top: 30px;" class="col-8">
                                <!-- Alert User -->
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            @endif

                        </div>

                </div>

                <style>
                    .table td, .table th {vertical-align: middle}
                </style>
                <!-- Content Row -->
                <div class="row">
                    <!-- Content Column -->
                    <div class="col-12">
                        <table class="table table-hover" id="categoryTbl">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>الرقم</th>
                                    <th>الاسم</th>
                                    <th>الصورة</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td><img src="{{asset('uploads/'.$category->image)}}" width="100" alt=""></td>
                                    {{-- <td>{{$post->user->name}}</td>
                                    <td>{{ ($post->category) ? $post->category->name : 'Uncategories' }}</td>--}}
                                    <td>
                                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="d-inline" action="{{route('admin.categories.destroy',$category->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('هل أنت متأكد من أنك تريد حذف هذا التصنيف؟')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{$categories->links()}} --}}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


