@section('titlepage', 'عن المصنع| برايفت ليبل')


@extends('front.layouts.master')
@section('content')


<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{__('about.About Us')}}</h2>
                <ul class="breadcrumb" dir="rtl">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">{{__('about.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('about.About Us')}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Start About Page  -->
 <div class="about-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="noo-sh-title"> <span>مصنع أبو يوسف حسونة وشركاؤه للجينز والملابس الجاهزة </span></h2>
                <p style="text-align: right">هل فكرت يومًا في من صنع الملابس التي ترتديها؟ قابل المبدعين. الأشخاص الذين يعملون بلا كلل لمنحك أفضل المنتجات ذات الجودة.</p>
                <p style="text-align: right"> نحن فريق من الحرفيين والحرفيات مكرسين لتزويدك بأفضل الملابس ذات الجودة.

                    من القص والخياطة والتطريز والخياطة على الأزرار تفصيل الملابس. نحن نفعل كل شيء ، وعمودنا الفقري هو القوى العاملة لدينا الذين لديهم حكايات حب خاصة بهم لما يفعلونه. شغفنا ينبع من تطلعاتهم وآمالهم في مستقبل أفضل

                    تابعنا على صفحتنا على facebook للحصول على نظرة ثاقبة حول كيفية صنع ملابسك والحصول على آخر التحديثات!</p>
            </div>
            <div class="col-lg-6">
                <div class="banner-frame"> <img class="img-thumbnail img-fluid" src="{{asset('front/images/about-img.jpg')}}" alt="" />
                </div>
            </div>
        </div>
        {{-- <div class="row my-5">
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3 style="text-align: right">نحن موثوقون</h3>
                    <p style="text-align: right">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3 style="text-align: right">نحن محترفون</h3>
                    <p style="text-align: right">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="service-block-inner">
                    <h3 style="text-align: right">نحن خبراء</h3>
                    <p style="text-align: right">نحن نستخدم خبرتنا لإنتاج ملابس ذات جودة عالية. </p>
                </div>
            </div>
        </div> --}}
        <div class="row my-4">
            <div class="col-12">
                <h2 class="noo-sh-title" style="text-align: center">المعارض المعتمدة</h2>
            </div>
            @foreach ($partners as $partner)


            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('uploads/'. $partner->image)}}" alt="" />
                        <div class="team-content">
                            <h3 class="title" style="padding-right: 20px; text-align: center; margin-right: 50px">{{$partner->name}}</h3></div>
                        <ul class="social">
                            <li>
                                <a href="{{$partner->facebook_link}}" class="fab fa-facebook"></a>
                            </li>
                            <li>
                                <a href="{{$partner->instgram_link}}" class="fab fa-instagram"></a>
                            </li>

                        </ul>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p style="text-align: right; font-family: cairo; color: black">{{$partner->info}} </p>
                    </div>
                    <hr class="my-0"> </div>
            </div>
            @endforeach
            {{-- <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('front/images/img-2.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Kristiana</h3> <span class="post">Web Developer</span> </div>
                        <ul class="social">
                            <li>
                                <a href="#" class="fab fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-instagram"></a>
                            </li>
                            <li>

                        </ul>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('front/images/img-3.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Steve Thomas</h3> <span class="post">Web Developer</span> </div>
                        <ul class="social">
                            <li>
                                <a href="#" class="fab fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-instagram"></a>
                            </li>
                        </ul>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('front/images/img-1.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Williamson</h3> <span class="post">Web Developer</span> </div>
                        <ul class="social">
                            <li>
                                <a href="#" class="fab fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-instagram"></a>
                            </li>
                        </ul>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- End About Page -->
@stop
