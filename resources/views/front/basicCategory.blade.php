
 @section('titlepage', 'التسوق| برايفت ليبل')

 @extends('front.layouts.master')
 @section('content')

<div class="col-lg-6">
    @if(Session::has('error'))
    <div class="alert alert-error">
        {{Session::get('error')}}
    </div>
@endif
</div>

 <!-- Start All Title Box -->
 <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>التسوق</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">الرئيسية</a></li>
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
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
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


                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">

                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @if(count($products)>0)
                                        @foreach ($products as $product)
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">{{$product->status->name}}</p>
                                                    </div>

                                                    <img src="{{asset('uploads/'.$product->product_image)}}" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="{{route('store.create',$product->slug)}}">اطلبه الآن</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <a href="{{route('store.show', $product->slug)}}" style="text-align: right"><h4 class="show">{{$product->name}}</h4></a>
                                                    <h4 style="text-align: right">{{$product->short_description}}</h4>
                                                    <h5 style="text-align: right">{{$product->regular_price}}</h5>
                                                    <h5 style="text-align: right">{{$sub_name}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div style="text-align: center" class="alert alert-danger">
                                        <p>عذراً لا يوجد منتجات لعرضها</p>
                                    </div>
                                        @endif
                                    </div>
                                </div>
                                {{$products->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@stop
