@extends('layouts.front')

@section('meta_des'){{$page->meta_description}}@endsection
@section('meta_key'){{$page->meta_keywords}}@endsection

@section('title')

    | {{ $title }}

@endsection

@section('content')

    @if ($page->image)
        <!-- start Header -->

        <div class="page-header section-dark" style="background-image: url('{{ asset($page->image) }}')">
            <div class="filter"></div>
            <div class="content-center">
                <div class="container">
                    <div class="title-brand">
                        <h1 class="presentation-title">{{ $title }}</h1>
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

                  @endif




                <div class="section section-dark text-center mt-5">
                    <div class="title ">
                        <h1 style="margin-top:-53px !important">{{ $title }}</h1>
                    </div>

                    <div class="pl-4">
                        <p style="color: #daa769">{{ $page->description }}</p>
                    </div>


                </div>

            @endsection
