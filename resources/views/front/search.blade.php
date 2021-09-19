@extends('front.layouts.master')
@section('content')

 <!-- Start All Title Box -->
 <div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>نتائج البحث</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active">نتائج البحث</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">


        {{-- @endforeach --}}

        <div class="row my-5" >
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>نتائج البحث</h1>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p> --}}
                </div>
                @if(count($related_products)>0)
                    @foreach ($related_products as $related_product)
                    <div class="row special-list" >

                    <div class="col-lg-4 col-md-6 special-grid best-seller" style="margin-left: 35%">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    {{-- <p class="sale">{{$related_product->stock_status}}</p> --}}
                                </div>
                                <img src="{{asset('uploads/'.$related_product->product_image)}}" class="img-fluid" alt="Image">
                                <div class="mask-icon">

                                    <form action="">
                                    <a class="cart" href="{{route('store.create',$related_product->slug)}}">اطلبه الآن</a>
                                </form>
                                </div>
                            </div>
                            <div class="why-text">
                                <a href="{{route('store.show',$related_product->slug)}}" style="text-align: right"><h4 class="show">{{$related_product->name}}</h4></a>
                                {{-- <h4 style="text-align: right">{{$related_product->short_description}}</h4> --}}
                                <h5 style="text-align: right"> {{$related_product->regular_price}}	₪</h5>
                            </div>
                        </div>
                    {{-- </div> --}}
                    </div>

                </div>
                    @endforeach
                    @else
                    <div class="alert alert-danger">
                    <p style="text-align: center;">عذراً لا يوجد منتجات مطابقة للبحث لعرضها</p>
                </div>
                    @endif


                {{-- {{$related_products->links()}} --}}
            </div>
        </div>

                {{-- <div class="featured-products-box owl-carousel owl-theme">
                    <div class="item">
                        <div class="products-single fix">
                    @foreach ($related_products as $related_product)

                            <div class="box-img-hover">
                                <img src="{{asset('front/images/img-pro-04.jpg')}}" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="#">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{$related_product->name}}</h4>
                                <h5>{{$related_product->regular_pric}}</h5>
                            </div>
                        </div>
                    </div>
                </div> --}}






                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->

@stop



