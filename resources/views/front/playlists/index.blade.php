@extends('layouts.front')


@section('meta_des')


@endsection
@section('meta_key')

@endsection


@section('title')

    | {{ $title }}

@endsection

@section('content')

    <div class="section ">

        <div class="container">
            <div class="title mt-2">
                <h1>{{ $title }}</h1>
            </div>

            <div class="row " >

                @foreach ($rows as $row)
                    <div class="col-md-4">
                        <a href="{{ route('front.playlist.show', $row->id) }}">
                            <div class="card" style="width: 20rem;">
                                <img class="card-img-top" src="{{ asset($row->image) }}" style="height: 300px"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <div class="card-title">
                                        <button class="btn btn-outline-info btn-sm mb-2"
                                            style="cursor: auto">{{ $row->videos()->published()->count() }}
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

            <div class="d-flex justify-content-center mt-5">

                {{ $rows->links() }}

            </div>
        </div>
    </div>

@endsection
