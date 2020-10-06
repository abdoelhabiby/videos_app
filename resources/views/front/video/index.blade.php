@extends('layouts.front')

@section('meta_des'){{$video->meta_description}}@endsection
@section('meta_key'){{$video->meta_keywords}}@endsection


@section('title')

    | {{ $title }}

@endsection

@section('content')

    <div class="section mt-2">

        <div class="container ">

            <div class="jumbotron pt-1">
                <h1 class="display-4 mb-2 h3">Title : {{ $video->name }}</h1>
            </div>

            <div class="row">
                @if (getVideoId($video->youtube))
                    <div class="col-md-12 ">
                        <iframe width="100%" height="500"
                            src="https://www.youtube-nocookie.com/embed/{{ getVideoId($video->youtube) }}" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                @endif


            </div>

            <div class="border p-2 d-flex mt-2 mb-2">

                <p class="mr-3"><i class="fa fa-user"></i> {{ $video->admin->name }} </p>
                <p class="mr-3"><i class="fa fa-list"></i> <a
                        href="{{ route('front.playlist.show', $video->playlist->id) }}">{{ $video->playlist->name }}</a></p>
                <p class="mr-3"><i class="fa fa-clock-o"></i> {{ $video->created_at }} </p>
            </div>

            <div class="next_prev">
                <div class="float-left">
                    @if ($prev)
                        <a href="{{ route('front.playlist.videos.show', $prev->id) }}" class="btn btn-success"><i
                                class="fa fa-arrow-left"></i> {{ $prev->name }} </a>

                    @endif
                </div>
                <div class="float-right">
                    @if ($next)
                        <a href="{{ route('front.playlist.videos.show', $next->id) }}" class="btn btn-success">
                            {{ $next->name }} <i class="fa fa-arrow-right"></i></a>

                    @endif
                </div>

                <div class="clearfix mb-2"></div>
            </div>

            <div class="jumbotron pt-1">
                <p>description : </p>
                <p class="pl-2">{{ $video->description }}</p>
            </div>


            {{-- ---------start comments ----------- --}}

               @include('front.video.comments._index')
            {{-- ---------end comments ----------- --}}


        </div>



    </div>



@endsection


