@section('titlepage', 'تفاصيل التسوق|برايفت ليبل')

@extends('front.layouts.master')
@section('content')
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>تفاصيل التسوق</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">التسوق</a></li>
                    <li class="breadcrumb-item active">تفاصيل التسوق  </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->


<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">


        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @elseif (session()->has('error'))
        <div class="alert alert-error">
            {{session()->get('error')}}
        </div>
        @endif

        @if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

        <div class="row">


            <div class="col-xl-7 col-lg-7 col-md-6">
                <img style="float: right; margin: 0px 30px 30px 30px;" src="{{asset('uploads/'.$product->product_image)}}" width="300px"  height="300px"/>
                <div class="single-uctuct-details">
                    <h2 style="text-align: right">{{$product->name}}</h2>



                    @if ($product->sale_price != null)
                    <h5 style="text-align: right"> <del>$ {{$product->regular_price}}	₪</del> {{$product->sale_price}}	₪</h5>
                    @else
                    <h5 style="text-align: right">{{$product->regular_price}}	₪</h5>
                    @endif

                    <p class="available-stock" style="text-align: right"><span>أكثر من  {{$product->quantity}} متاحة </span>
                        <p>
                            <h4 style="text-align: right">الوصف:</h4>
                            <p style="text-align: right">{{$product->description}} </p>




                                        <li>
                                        <div class="form-group quantity-box">
                                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">


                                        <a class="btn hvr-hover" data-fancybox-close="" style="background:#d33b33" href="{{route('store.create',$product->slug)}}">اطلبه الآن</a>
                                        </div>
                                        </li>
                                </form>
                                </div>
                            </div>

                            <div class="add-to-btn">
                                {{-- <div class="add-comp">
                                    <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i>أضف إلى المحفظة</a>
                                    <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> أضف للمقارنة</a>
                                </div> --}}
                                <div class="share-bar">
                                    <a class="btn hvr-hover" href="https://www.facebook.com/%D8%A7%D8%A8%D9%88-%D9%8A%D9%88%D8%B3%D9%81-%D8%AD%D8%B3%D9%88%D9%86%D8%A9-%D9%88%D8%B4%D8%B1%D9%83%D8%A7%D8%A4%D9%87-%D9%84%D9%84%D8%AC%D9%8A%D9%86%D8%B2-%D9%88%D8%A7%D9%84%D9%85%D9%84%D8%A7%D8%A8%D8%B3-%D8%A7%D9%84%D8%AC%D8%A7%D9%87%D8%B2%D8%A9-1766936843613122"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                    <a class="btn hvr-hover" href="https://wa.me/+972599321032"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                </div>
                            </div>
                </div>
            </div>
        </div>

        {{-- @endforeach --}}

        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>منتجات ذات صلة</h1>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p> --}}
                </div>
                <div class="row special-list">
                    @foreach ($related_products as $related_product)


                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    {{-- <p class="sale">{{$related_product->stock_status}}</p> --}}
                                </div>
                                <img src="{{asset('uploads/'.$related_product->product_image)}}" class="img-fluid" alt="{{$product->name}}">
                                <div class="mask-icon">
                                    {{-- <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul> --}}
                                    <a class="cart" href="{{route('store.create',$product->slug)}}">اطلبه الآن</a>
                                </div>

                            </div>
                            <div class="why-text">
                                <a href="{{route('store.show',$related_product->slug)}}" style="text-align: right"><h4 class="show">{{$product->name}}</h4></a>
                                {{-- <h4 style="text-align: right">{{$related_product->short_description}}</h4> --}}
                                <h5 style="text-align: right"> {{$related_product->regular_price}}	₪</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

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
