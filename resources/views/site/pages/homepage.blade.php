@extends('site.app')
@section('title', 'Homepage')

@section('content')
    <div class="container-fluid">
        <div id="app" style="padding-bottom: 5%;">
            <header class="with-background">
                <div class="top-nav container">
                    <div class="top-nav-left" style="padding:10px;">
                        <div class="logo"><strong>ABCDRONES</strong> </div>

                    </div>
                    {{--                    --}}{{-- <div class="top-nav-right">--}}
                    {{--                        @include('site.partials.header')--}}
                    {{--                    </div>--}}
                    {{--                </div> <!-- end top-nav --> --}}

                </div><!-- end hero -->
            </header>
        </div>
        <div class="container hero">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100"  src="https://dronerush.com/wp-content/uploads/2018/08/DJI-Mavic-2-Pro-flying-top.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100"  src="https://dronerush.com/wp-content/uploads/2020/10/DJI-Mini-2-flying-angle-bushes-1200x675.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://dronerush.com/wp-content/uploads/2021/02/DJI-FPV-front-lights-1200x675.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div><!-- end hero-image -->

        </div>
        <div class="container" style="padding: 5%;">
            <div class="products text-center">
                <div class="row">
                    <div class="col-sm-12">
                        @if (Session::has('message'))
                            <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-4 col-sm-12">

                            <div class="card-product" >
                                <div class="product">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <img
                                            src="{{ asset('../../storage/' . $product->images->first()->full)}}" height="100px"
                                            width="200px" alt="product"></a>
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <div class="product-name">{{ $product->name }}</div>
                                    </a>
                                    <div class="product-price">{{ $product->price }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end container -->
    </div>

@endsection
