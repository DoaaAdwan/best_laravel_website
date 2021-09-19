    @extends('admins.layouts.master')
    @section('content')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">لوحة التحكم</h1>

                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="{{route('admin.products.index')}}">
                                     المنشورات</a></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$posts_count}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-file fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Product Categories</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$product_categories_count}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chevron-circle-down fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="">المستخدمين
                                        </a></div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$users_count}}</div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                <!-- Content Row -->

                   <!-- Content Row -->


                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <a href="{{route('admin.products.index')}}">الملابس</a></div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$products_count}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tshirt fa-2x text-gray-300"></i>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="{{route('admin.categories.index')}}">تصنيفات الملابس</a>     </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories_count}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-chevron-circle-down fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <a href="{{route('admin.partners.index')}}">المعارض المعتمدة</a>     </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories_count}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chevron-circle-down fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- Earnings (Monthly) Card Example -->
                 <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    <a href="{{route('admin.show')}}"> الطلبات</a>     </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories_count}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chevron-circle-down fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
    @stop
