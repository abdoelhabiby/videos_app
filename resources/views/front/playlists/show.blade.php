@extends('layouts.front')




@section('meta_des'){{$row->meta_description}}
@endsection@section('meta_key'){{$row->meta_keywords}}@endsection

@section('title')

    | {{ $title }}

@endsection

@section('content')

    <div class="section mt-2">

        <div class="container ">

            <div class="jumbotron pt-1">
                <h3 class="display-4 mb-2">{{ $row->name }}</h3>
            </div>

            <div class="row ">
                <div class="col-md-6 border p-2">
                    <img src="{{ asset($row->image) }}" style="height: 450px; width:100% " alt="{{ $row->name }}">
                    <div class="description">
                        <h4>description : </h4>
                        <p class="mt-2">{{ $row->description }}/p>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="border p-2">
                        <p class="">category : {{ $row->category->name }}</p>
                        <p class="">videos : {{ $row->videos->count() }}</p>
                    </div>
                    <div class="border p-2 mt-2">

                        <p class="h5">Skills : </p>

                        <div class="skills">
                            @foreach ($row->skills as $skill)
                                <a href="{{ route('front.skills.show', $skill->id) }}"
                                    class="btn btn-outline-info btn-sm">{{ $skill->name }}</a>
                            @endforeach
                        </div>


                    </div>

                    <div class="border p-2 mt-2">

                        <p class="h5">Tags : </p>

                        <div class="tags">
                            @foreach ($row->tags as $tag)
                                <a href="{{ route('front.tags.show', $tag->id) }}"
                                    class="btn btn-outline-primary btn-sm">{{ $tag->name }}</a>
                            @endforeach
                        </div>


                    </div>

                    {{-- -------------------------- --}}

                    <div class=" border p-2 mt-2">
                        <h5>Playlist videos</h5>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($row->videos as $index => $video)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td><a href="{{ route('front.playlist.videos.show', $video->id) }}"
                                                class="text-dark">{{ $video->name }}</a></td>
                                        <td>--</td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>


                </div>

            </div>

{{--
            <div class="row mt-3">
                <div class="col-md-8 border p-2">
                    <h5>Playlist videos</h5>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($row->videos as $index => $video)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td><a href="{{ route('front.playlist.videos.show', $video->id) }}"
                                            class="text-dark">{{ $video->name }}</a></td>
                                    <td>--</td>
                                </tr>

                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div> --}}


        </div>
    </div>

@endsection
