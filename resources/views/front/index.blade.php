
   @section('titlepage', 'الصفحة الرئيسية| برايفت ليبل')

   @extends('front.layouts.master')
   @section('content')

    <style>
        .page-item.active .page-link{
            background-color: #d33b33;
            border-color: #d33b33;
            color:white;
        }
        .page-link{
            color:black;
        }
    </style>

   <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            @foreach ($sliders as $slider)
            @if($slider->id == 2)
            <li class="text-left">
                <img src="{{asset('uploads/'. $slider->image)}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20" style="text-align: center"><strong>{{$slider->title}}</strong></h1>
                            <p class="m-b-40" style="text-align: center">{{$slider->subtitle}}</p>
                            <p><a  class="btn hvr-hover" style="background-color: #d33b33"  href="#">{{__('slider.Shop New')}}</a></p>
                        </div>
                    </div>
                </div>
            </li>
            @else
            <li class="text-left">
                <img src="{{asset('uploads/'. $slider->image)}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20" style="text-align: right"><strong>{{$slider->title}}</strong></h1>
                            <p class="m-b-40" style="text-align: right">{{$slider->subtitle}}</p>
                            <p><a class="btn hvr-hover" style="background-color: #d33b33"  href="#">{{__('slider.Shop New')}}</a></p>
                        </div>
                    </div>
                </div>
            </li>

            @endif

            @endforeach
            {{-- <li class="text-center">
                <img src="{{asset('front/images/banner-02.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>{{__('slider.welcome')}} <br> {{__('slider.shop')}}</strong></h1>
                            <p class="m-b-40">{{__('slider.see')}} <br> </p>
                            <p><a class="btn hvr-hover" href="#">{{__('slider.Shop New')}}</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="{{asset('front/images/banner-03.jpg')}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>{{__('slider.welcome')}} <br> {{__('slider.shop')}}</strong></h1>
                            <p class="m-b-40">{{__('slider.see')}} <br> </p>
                            <p><a class="btn hvr-hover" href="#">{{__('slider.Shop New')}}</a></p>
                        </div>
                    </div>
                </div>
            </li> --}}
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{asset('uploads/'.$category->image)}}" alt="" />
                        <a class="btn hvr-hover" style="background-color: #d33b33"  href="{{route('store.basic',$category->id)}}">{{$category->name}}</a>
                    </div>
                </div>
{{--
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{asset('front/images/shirt-img.jpg')}}" alt="" />
                        <a class="btn hvr-hover" href="#">{{$product_category->name}}</a>
                    </div> --}}

                @endforeach




                {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{asset('front/images/wallet-img.jpg')}}" alt="" />
                        <a class="btn hvr-hover" href="#">Wallet</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{asset('front/images/women-bag-img.jpg')}}" alt="" />
                        <a class="btn hvr-hover" href="#">Bags</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{asset('front/images/shoes-img.jpg')}}" alt="" />
                        <a class="btn hvr-hover" href="#">Shoes</a>
                    </div>
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="{{asset('front/images/women-shoes-img.jpg')}}" alt="" />
                        <a class="btn hvr-hover" href="#">Women Shoes</a>
                    </div>
                </div> --}}
            </div>


        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>{{__('content.Featured Products')}}</h1>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">{{__('content.All')}}</button></a>
                            <button data-filter=".top-featured">{{__('content.Top featured')}}</button>
                            <button data-filter=".most-popular">الأكثر رواجاً</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
                @if(count($popular_products)>0)
                @foreach ($popular_products as $product)
                <div class="col-lg-3 col-md-6 special-grid most-popular">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <!-- this code if we want to return value from another table
                                    we use the name of method in the model product which defined the
                                    relation between product and status -->
                                <p class="sale">{{$product->status->name}}</p>
                            </div>
                            <img src="{{asset('uploads/'.$product->product_image)}}" class="img-fluid" alt="product_image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="{{route('store.create',$product->slug)}}">اطلبه الآن</a>
                            </div>
                        </div>
                        {{-- @dump($product->id) --}}
                        <div class="why-text">
                            <a href="{{route('store.show', $product->slug)}}" style="text-align: right"><h4 class="show">{{$product->name}}</h4></a>
                            <h4 style="text-align: right">{{$product->short_description}}</h4>
                            <h5 style="text-align: right"> {{$product->regular_price}}	₪</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>عذراً لا يوجد منتجات لعرضها</p>
                @endif

                {{-- @dd('stop') --}}
                @if(count($featured_products)>0)
                @foreach ($featured_products as $featured_product)
                <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">{{$featured_product->status->name}}</p>
                            </div>
                            <img src="{{asset('uploads/'.$featured_product->product_image)}}" class="img-fluid" alt="Image">
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
                            <a href="{{route('store.show', $featured_product->slug)}}" style="text-align: right"><h4 class="show">{{$featured_product->name}}</h4></a>
                            <h4 style="text-align: right">{{$featured_product->short_description}}</h4>
                            <h5 style="text-align: right"> {{$featured_product->regular_price}}	₪</h5>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>عذراً لا يوجد منتجات لعرضها</p>
                @endif




            </div>

            {{$products->links()}}
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>{{__('content.latest blog')}}</h1>
                    <p style="color: black">{{__('content.stay')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div class="blog-box" dir="rtl">
                    <div class="blog-img">
                        <img class="img-fluid" src="{{asset('uploads/'. $post->image) }}" alt="" />
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3 style="text-align: right">{{$post->title}}</h3>
                            <p style="text-align: right">{{$post->body}}</p>
                    </div>
                        {{-- <ul class="option-blog">
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i class="far fa-comments"></i></a></li>
                        </ul> --}}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{$posts->links()}}
    </div>
</div>
    <!-- End Blog  -->

    @stop
