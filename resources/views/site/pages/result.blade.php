@extends('site.app')
@section('title', 'Result')
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Search Results</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top" id="site">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-1 text-center justify-content-center">

                        <div class="row no-gutters">
                                    @if ($resultproducts->count() > 0)
                                        @foreach($resultproducts as $product)
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    @foreach($imageproducts as $imageproduct)
                                                        <img src="{{ asset('../../../storage/'.$imageproduct->first()->full )}}" class="card-img-top" alt="{{$product->name}} Image">
                                                    @endforeach
                                                        <div class="card-body">
                                                        <h5 class="card-title">{{$product->name}}</h5>
                                                        <p class="card-text">{{$product->description}}</p>
                                                        <a href="{{ route('product.show',$product->slug) }}" class="btn btn-sm btn-success"><i class="fa fa-shopping-cart"></i> Product</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="img-big-wrap">
                                            <div class="justify-content-center">
                                                <img src="{{asset('../../../frontend/images/icons/no-data-found.png')}}" height="50%" width="80%" alt="">
                                            </div>
                                        </div>
                                    @endif
                        </div>

                </div>
            </div>
        </div>
    </section>
@stop

