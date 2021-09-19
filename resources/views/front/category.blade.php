
 @section('titlepage', 'التصنيفات|برايفت ليبل')


 @extends('front.layouts.master')
 @section('content')

 <!-- Start All Title Box -->
 <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>التسوق</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item active">التسوق</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!--start shop page -->
    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="{{route('store.search')}}" method="POST" >
                                @csrf
                                <input class="form-control search-form" style="margin-right:50px" placeholder="ابحث هنا" type="text" id="search" name="query">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>التصنيفات</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                @foreach ($categories as $cat)
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#{{$cat->id}}" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">{{$cat->name}}
								</a>
                                    <div class="collapse show" id="{{$cat->id}}" data-parent="#list-group-men">
                                        <div class="list-group">
                                            @foreach ($cat->categories as $subcat)
                                            <a href="{{route('store.categories',$subcat->id)}}" class="list-group-item list-group-item-action active">{{$subcat->name}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div>
                        <div class="filter-brand-left">
                            <div class="title-left">
                                <h3>Brand</h3>
                            </div>
                            <div class="brand-box">
                                <ul>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios1" value="Yes" type="radio">
                                            <label for="Radios1"> Supreme </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios2" value="No" type="radio">
                                            <label for="Radios2"> A Bathing Ape </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios3" value="declater" type="radio">
                                            <label for="Radios3"> The Hundreds </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios4" value="declater" type="radio">
                                            <label for="Radios4"> Alife </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios5" value="declater" type="radio">
                                            <label for="Radios5"> Neighborhood </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios6" value="declater" type="radio">
                                            <label for="Radios6"> CLOT </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios7" value="declater" type="radio">
                                            <label for="Radios7"> Acapulco Gold </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios8" value="declater" type="radio">
                                            <label for="Radios8"> UNDFTD </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios9" value="declater" type="radio">
                                            <label for="Radios9"> Mighty Healthy </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="radio radio-danger">
                                            <input name="survey" id="Radios10" value="declater" type="radio">
                                            <label for="Radios10"> Fiberops </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right" >
                    <div class="right-product-box">
                        {{-- <div class="product-item-filter row">
                            <div class="toolbar-sorter-right">
                                <span style="float: right"> الترتيب حسب: </span>
                                <div class="special-menu text-center">
                                    <div class="button-group filter-button-group" >
                                        <button class="active" data-filter="*">الكل</button></a>
                                        <button data-filter=".most-popular">الأكثر رواجاً</button>
                                        <button data-filter=".newest">الأحدث </button>


                                </div>

                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="row product-categorie-box most-popular">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">

                                    <h1 align="center" >{{$category->name}}</h1>
                                    <div class="row">
                                        @if(count($popular_products)>0)
                                        @foreach ($popular_products as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 ">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">{{$product->status->name}}</p>
                                                    </div>

                                                    <img src="{{asset('uploads/'.$product->product_image)}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">

                                                        <a class="cart" href="{{route('store.create',$product->slug)}}">اطلبه الآن</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <a href="{{route('store.show', $product->slug)}}" style="text-align: right"><h4 class="show">{{$product->name}}</h4></a>
                                                    <h4 style="text-align: right">{{$product->short_description}}</h4>
                                                    <h5 style="text-align: right">{{$product->regular_price}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <p style="text-align: center; margin-top: 50px">عذراً لا يوجد منتجات لعرضها</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->


@stop
