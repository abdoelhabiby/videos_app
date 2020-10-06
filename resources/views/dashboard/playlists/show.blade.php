@extends('layouts.dashboard')


@php
$model_name = 'videos';
@endphp


@section('title')
    | dashboard | {{ $playlist->name . ' | ' . $model_name }}
@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">

                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.playlists.index') }}">playlists</a>
                                </li>
                                <li class="breadcrumb-item active"> {{ $playlist->name }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')







                {{-- start show videos --}}

                @include('dashboard.playlists.videos._index')


                {{-- end show videos --}}


                {{-- start form create --}}

                @include('dashboard.playlists.videos._create')


                {{-- end form create --}}
            </div>
        </div>

    </div>



    <!-- Modal delete -->

    @include('dashboard.includes.alerts.model_delete')






@endsection
