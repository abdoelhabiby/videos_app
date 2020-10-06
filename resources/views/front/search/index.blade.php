@extends('layouts.front')



@section('content')

    <div class="section ">

        <div class="container">
            <div class="title mt-2">
                <h2>{{ $title }}</h2>
            </div>

            @if (!$playlists->count() > 0 && !$videos->count() > 0)
                <div class="text-center">
                    <h3>result search notfound</h3>
                </div>
            @endif

            @if ($playlists->count() > 0)
                <h5 class="text-center">Playlists</h5>
                <hr>
                <div class="row ">

                    @foreach ($playlists as $row)
                        <div class="col-md-4">

                            <a href="{{ route('front.playlist.show', $row->id) }}">
                                <div class="card" style="width: 20rem;">
                                    <img class="card-img-top" src="{{ asset($row->image) }}" style="height: 300px"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <button class="btn btn-outline-info btn-sm mb-2"
                                                style="cursor: auto">{{ $row->videos()->count() }}
                                                videos</button>
                                        </div>
                                        <p class="card-text">{{ Str::limit($row->description, 200) }}</p>
                                        <a href="{{ route('front.playlist.show', $row->id) }}"
                                            class="btn btn-primary">videos</a>
                                    </div>
                                </div>
                            </a>
                        </div>

                    @endforeach


                </div>

            @endif


            @if ($videos->count() > 0)

                <div class=" border p-2 mt-2">
                    <h5>Videos</h5>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $index => $video)
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


            @endif


        </div>
    </div>

@endsection
