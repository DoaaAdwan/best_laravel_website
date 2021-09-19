


    <!-- Start Main Top -->
    <div class="main-top" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> {{__('topnav.Shop Now')}}
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> {{__('topnav.Fashion')}}
                                </li>

                                <li>
                                    <i class="fab fa-opencart"></i> {{__('topnav.Off')}}
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> {{__('topnav.Shop Now')}}
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> {{__('topnav.Fashion')}}
                                </li>

                                <li>
                                    <i class="fab fa-opencart"></i> {{__('topnav.Off')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                    <div class="right-phone-box">
                        <p>{{__('topnav.Call US')}} :- <a href="tel:972599321032+"> 972599321032+</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#bottom">{{__('topnav.Our location')}}</a></li>
                            <li><a href="{{route('store.contact')}}">{{__('topnav.Contact Us')}}</a></li>
                            @if(Route::has('login'))
                            @auth
                            <li><a href="{{route('store.myaccount')}}">{{__('topnav.My Account')}}</a>({{ Auth::user()->name }})</li>
                        <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{__('topnav.logout')}}</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                            @endauth
                            @guest
                            <li><a href="{{route('login')}}">{{__('topnav.login')}}</a></li>
                            <li><a href="{{route('register')}}">{{__('topnav.register')}}</a></li>
                            @endguest

                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="{{asset('front/images/logo.jpeg')}}" class="logo" alt="" style="width: 160px; height: 76;"></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item {{request()->routeIs('index') ? 'active':''}}"><a class="nav-link" href="{{route('index')}}">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link " href="{{route('store.about')}}">{{__('navbar.About Us')}}</a></li>
                        <li class="dropdown megamenu-fw">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">{{__('navbar.Product')}}</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <li>
                                    <div class="row">
                                        @foreach ($categories as $cat)
                                        <div class="col-menu col-md-3">
                                            <a href="{{route('store.basic',$cat->id)}}"><h6 class="title">{{$cat->name}}</h6></a>


                                                <ul class="menu-col">
                                                    @foreach ($cat->categories as $subcat)
                                                    <li><a href="{{route('store.categories',$subcat->id)}}">{{$subcat->name}}</a></li>
                                                    @endforeach
                                                </ul>


                                        </div>
                                        @endforeach
                                        <!-- end col-3 -->

                                    </div>
                                    <!-- end row -->
                                </li>
                            </ul>
                        </li>



                        {{-- <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">حسابي</a>
                            <ul class="dropdown-menu">


                                <li><a href="{{route('store.myaccount')}}" style="text-align: center"> حسابي </a></li> --}}
                                <li class="nav-item"><a class="nav-link" href="{{route('store.myaccount')}}">حسابي</a></li>

                                {{-- <li><a href="{{route('store.show')}}">تفاصيل التسوق</a></li> --}}
                            {{-- </ul>
                        </li> --}}
                        {{-- <li class="nav-item"><a class="nav-link" href="{{route('store.services')}}">{{__('navbar.Our Service')}}</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="{{route('store.contact')}}">{{__('navbar.Contact Us')}}</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->

                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            {{-- <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front/images/img-pro-01.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Delica omtantur </a></h6>
                            <p>1x - <span class="price">$80.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front/images/img-pro-02.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Omnes ocurreret</a></h6>
                            <p>1x - <span class="price">$60.00</span></p>
                        </li>
                        <li>
                            <a href="#" class="photo"><img src="{{asset('front/images/img-pro-03.jpg')}}" class="cart-thumb" alt="" /></a>
                            <h6><a href="#">Agam facilisis</a></h6>
                            <p>1x - <span class="price">$40.00</span></p>
                        </li>
                        <li class="total">
                            <a href="#" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                            <span class="float-right"><strong>Total</strong>: $180.00</span>
                        </li>
                    </ul>
                </li>
            </div> --}}
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

