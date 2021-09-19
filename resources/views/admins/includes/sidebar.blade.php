
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " style="align-items: rtl" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">الأدمن <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if (auth()->user()->user_type == 'admin')
                <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>لوحة التحكم</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file"></i>
                    <span>المنشورات</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->routeIs('admin.posts.index') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">كل المنشورات </a>
                <a class="collapse-item {{ request()->routeIs('admin.posts.create') ? 'active' : '' }}" href="{{ route('admin.posts.create') }}">إضافة منشور </a>

            </div>
        </div>
            </li>


            <!-- Nav Item - Categories Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories"
                    aria-expanded="true" aria-controls="collapseCategories">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Categories</span>
                </a>
                <div id="collapseCategories" class="collapse" aria-labelledby="headingCategories"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('admin.categories.index'? 'active':'')}}" href="{{route('admin.categories.index')}}">All Categories</a>
                        <a class="collapse-item {{request()->routeIs('admin.categories.create'? 'active':'')}}" href="{{route('admin.categories.create')}}">Add category</a>
                    </div>
                </div>
            </li> --}}
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-tshirt"></i>
                    <span style="text-align: rtl">الملابس</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item {{request()->routeIs('admin.products.index'? 'active':'')}}" href="{{route('admin.products.index')}}">كل الملابس</a>
                        <a class="collapse-item {{request()->routeIs('admin.products.create'? 'active':'')}}" href="{{route('admin.products.create')}}">إضافة </a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProductCategories"
                    aria-expanded="true" aria-controls="collapseProductCategories">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>تصنيفات الملابس</span>
                </a>
                <div id="collapseProductCategories" class="collapse" aria-labelledby="headingProductCategories"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('admin.categories.index'? 'active':'')}}" href="{{route('admin.categories.index')}}">كل التصنيفات</a>
                        <a class="collapse-item {{request()->routeIs('admin.categories.create'? 'active':'')}}" href="{{route('admin.categories.create')}}">أضف تصنيف</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrders"
                    aria-expanded="true" aria-controls="collapseOrders">
                    <i class="fas fa-fw fa-bars"></i>
                    <span> كل الطلبات</span>
                </a>
                <div id="collapseOrders" class="collapse" aria-labelledby="headingOrders"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('admin.show'? 'active':'')}}" href="{{route('admin.show')}}">كل الطلبات</a>

                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesliders"
                    aria-expanded="true" aria-controls="collapsesliders">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>إدارة السلايدر في الصفحة الرئيسية</span>
                </a>
                <div id="collapsesliders" class="collapse" aria-labelledby="headingsliders"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('admin.home_sliders.index'? 'active':'')}}" href="{{route('admin.home_sliders.index')}}">كل السلايدر</a>
                        <a class="collapse-item {{request()->routeIs('admin.home_sliders.create'? 'active':'')}}" href="{{route('admin.home_sliders.create')}}">إضافة سلايدر</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepartners"
                    aria-expanded="true" aria-controls="collapsepartners">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>إدارة المعارض المعتمدة</span>
                </a>
                <div id="collapsepartners" class="collapse" aria-labelledby="headingpartners"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('admin.partners.index'? 'active':'')}}" href="{{route('admin.partners.index')}}">كل المعارض</a>
                        <a class="collapse-item {{request()->routeIs('admin.partners.create'? 'active':'')}}" href="{{route('admin.partners.create')}}">إضافة معرض</a>
                    </div>
                </div>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsehomecategories"
                    aria-expanded="true" aria-controls="collapsehomecategories">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>تصنيفات الصفحة الرئيسية</span>
                </a>
                <div id="collapsehomecategories" class="collapse" aria-labelledby="headinghomecategories"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{request()->routeIs('admin.home_categories.index'? 'active':'')}}" href="{{route('admin.home_categories.index')}}">كل تصنيفات الصفحة الرئيسية</a>
                        <a class="collapse-item {{request()->routeIs('admin.home_categories.create'? 'active':'')}}" href="{{route('admin.home_categories.create')}}">إضافة تصنيف جديد</a>
                    </div>
                </div>
            </li> --}}





            {{-- <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> --}}


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->
