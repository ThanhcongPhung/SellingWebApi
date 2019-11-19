@extends('layouts.frontLayout.front_design')
@section('content')

    <body>
        <div class="flex-center position-ref full-height">
            

           <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                             @foreach($banners as $key => $banner)
                                <!-- <div class="item @if($key ==0) active @endif">
                                <a href="{{$banner->link}}" title="Banner_1">
                                    <img src="/images/frontend_images/banners/{{ $banner->image }}" style="width:250px;">
                                    </a> -->
                    <!-- src="{{ asset('/images/frontend_images/banners/'.$banner->image) }}" -->
                                <!-- </div> -->
                                <div class="item @if($key ==0) active @endif">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>100% Responsive Design</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">
                                            <a href="{{$banner->link}}" title="Banner_1">Get it now</a>
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- <img src="/images/frontend_images/home/girl2.jpg" class="girl img-responsive" alt="" /> -->
                                        <img src="/images/frontend_images/banners/{{ $banner->image }}" class="girl img-responsive" style="width: 484px;height: 441px;">
                                        <!-- <img src="/images/frontend_images/home/pricing.png"  class="pricing" alt="" /> -->
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <!--  -->

@endsection
            <div class="carousel-inner">

            </div>

            <!-- <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="/home">Home</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div> -->
        </div>
    </body>
</html>
