@extends('layouts.front')


@section('content')


    <!-- start Header -->

    <div class="page-header section-dark" style="background-image: url('{{ asset('front') }}/img/daniel-olahh.jpg')">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="title-brand">
                    <h1 class="presentation-title">Videos App</h1>
                    <h2 class="presentation-subtitle text-center">Show videos to you </h2>
                    <div class="fog-low">
                        <img src="{{ asset('front') }}/img/fog-low.png" alt="">
                    </div>
                    <div class="fog-low right">
                        <img src="{{ asset('front') }}/img/fog-low.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="moving-clouds" style="background-image: url(" {{ asset('front') }}/img/clouds.png"); "> </div>

        </div>

        <!-- End Header -->



        <!-- start section latest playlist -->

        @include('front.home._latest-playlist')


        <!-- End section latest playlist -->






@endsection
