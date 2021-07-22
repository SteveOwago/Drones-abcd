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

                            <div class="img-big-wrap">
                                <div class="justify-content-center">
                                    <img src="{{asset('../../../frontend/images/icons/no-data-found.png')}}" height="50%" width="80%" alt="">
                                </div>
                            </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
@stop

