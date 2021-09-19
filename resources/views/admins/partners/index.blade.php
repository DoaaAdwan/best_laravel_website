
@extends('admins.layouts.master')
@section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">كل المعارض المعتمدة</h1>
                </div>
                <div class="pull-right" style="margin-bottom: 20px" >
                    <a class="btn btn-success" href="{{ route('admin.partners.create') }}"> أضف معرض جديد</a>
                    <a class="btn btn-info" href="{{ route('store.about') }}"><i class="fas fa-eye"></i> معاينة</a>


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
                                    <th>المعلومات</th>
                                    <th>الصورة</th>
                                    <th>رابط الفيسبوك </th>
                                    <th> رابط الانستجرام</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partners as $partner)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$partner->name}}</td>
                                    <td>{{$partner->info}}</td>
                                    {{-- <td>{{ ($post->category) ? $post->category->name : 'Uncategories' }}</td> --}}
                                <td><img src="{{asset('uploads/'.$partner->image)}}" width="100" alt=""></td>
                                <td>{{$partner->facebook_link}}</td>
                                <td>{{$partner->instgram_link}}</td>
                                    <td>
                                        <a href="{{route('admin.partners.edit', $partner->id)}}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="d-inline" action="{{route('admin.partners.destroy',$partner->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{$sliders->links()}} --}}
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
@stop


