@extends('site.app')
@section('title', $category->name)
@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">{{ $category->name }}</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div id="code_prod_complex">
                <div class="row">
                    <div class="col-sm-12">
                        @if (Session::has('message'))
                            <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                 @if(count($cartItems)==0)
                    @forelse($category->products as $product)
                        <div class="col-md-4">
                            <figure class="card card-product">
                                @if ($product->images->count() > 0)
                                    <div class="img-wrap padding-y"> <img
                                            src={{  asset('../../../storage/' . $product->images->first()->full) }} height="100px"
                                            width="100px" alt=""></div>
                                @else
                                    <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                                @endif
                                <figcaption class="info-wrap">
                                    <h4 class="title"><a
                                            href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                </figcaption>
                                <div class="bottom-wrap">
                                    <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i>
                                        Buy Now</a>
                                    @if ($product->sale_price != 0)
                                        <div class="price-wrap h5">
                                            <span class="price">
                                                {{ config('settings.currency_symbol') . $product->sale_price }}
                                            </span>
                                            <del class="price-old">
                                                {{ config('settings.currency_symbol') . $product->price }}</del>
                                        </div>
                                    @else
                                        <div class="price-wrap h5">
                                            <span class="price"> {{ config('settings.currency_symbol') . $product->price }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </figure>
                        </div>
                    @empty
                        <p>No Products found in {{ $category->name }}.</p>
                    @endforelse


                    @else
                        <div class="col-md-8">
                            @forelse($category->products as $product)
                                <div class="col-md-4">
                                    <figure class="card card-product">
                                        @if ($product->images->count() > 0)
                                            <div class="img-wrap padding-y"> <img
                                                    src={{  asset('../../../storage/' . $product->images->first()->full) }} height="100px"
                                                    width="100px" alt=""></div>
                                        @else
                                            <div class="img-wrap padding-y"><img src="https://via.placeholder.com/176" alt=""></div>
                                        @endif
                                        <figcaption class="info-wrap">
                                            <h4 class="title"><a
                                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h4>
                                        </figcaption>
                                        <div class="bottom-wrap">
                                            <a href="{{ route('product.show', $product->slug) }}" class="btn btn-sm btn-success float-right"><i class="fa fa-cart-arrow-down"></i>
                                                Buy Now</a>
                                            @if ($product->sale_price != 0)
                                                <div class="price-wrap h5">
                                            <span class="price">
                                                {{ config('settings.currency_symbol') . $product->sale_price }}
                                            </span>
                                                    <del class="price-old">
                                                        {{ config('settings.currency_symbol') . $product->price }}</del>
                                                </div>
                                            @else
                                                <div class="price-wrap h5">
                                            <span class="price"> {{ config('settings.currency_symbol') . $product->price }}
                                            </span>
                                                </div>
                                            @endif
                                        </div>
                                    </figure>
                                </div>
                            @empty
                                <p>No Products found in {{ $category->name }}.</p>
                            @endforelse
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <table class="table table-hover table-responsive shopping-cart-wrap">
                                    <thead class="text-muted">
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col" width="120">Quantity</th>
                                        <th scope="col" width="120">Price</th>
                                        <th scope="col" class="text-right" width="200">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach (\Cart::getContent() as $item)
                                        <tr>
                                            <td>
                                                <figure class="media">
                                                    <figcaption class="media-body">
                                                        <h6 class="title text-truncate">{{ Str::words($item->name, 20) }}
                                                        </h6>
                                                        @foreach ($item->attributes as $key => $value)
                                                            <dl class="dlist-inline small">
                                                                <dt>{{ ucwords($key) }}: </dt>
                                                                <dd>{{ ucwords($value) }}</dd>
                                                            </dl>
                                                        @endforeach
                                                    </figcaption>
                                                </figure>
                                            </td>
                                            <td>
                                                <var class="price">{{ $item->quantity }}</var>
                                            </td>
                                            <td>
                                                <div class="price-wrap">
                                                    <var
                                                        class="price">{{ config('settings.currency_symbol') . $item->price }}</var>
                                                    <small class="text-muted">each</small>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('checkout.cart.remove', $item->id) }}"
                                                   class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                 @endif
                </div>
            </div>
        </div>
    </section>
@stop
