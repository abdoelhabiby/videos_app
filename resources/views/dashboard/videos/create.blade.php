@extends('layouts.dashboard')


@php
$model_name = 'videos';
@endphp

@section('title')
    | dashboard | {{ $model_name }} | create
@endsection





@section('content')


    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">home </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.' . $model_name . '.index') }}">
                                        {{ $model_name }} </a>
                                </li>
                                <li class="breadcrumb-item active"> add
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')



                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> add {{ Str::singular($model_name) }}
                                    </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('dashboard.' . $model_name . '.store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-body">
                                                <h4 class="form-section"><i class="la la-youtube"></i>
                                                    {{ Str::singular($model_name) }} data </h4>


                                                <div class="row">


                                                    @php
                                                    $input = 'name';
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> {{ $input }} </label>
                                                            <input type="text" value="{{ old($input) }}" id="{{ $input }}"
                                                                class="form-control" placeholder="input {{ $input }}   "
                                                                name="{{ $input }}">
                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    @php
                                                    $input = 'meta_keywords';
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> meta keywords </label>
                                                            <input type="text" value="{{ old($input) }}" id="{{ $input }}"
                                                                class="form-control" placeholder="input meta keywords   "
                                                                name="{{ $input }}">
                                                            @error($input)
                                                            <span class="text-danger">{{ $message }} </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">





                                                    @php
                                                    $input = 'published';
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> published </label>
                                                            <select name="{{ $input }}" id="{{ $input }}"
                                                                class="form-control">

                                                                <option value="1"
                                                                    {{ old($input) == '1' ? 'selected' : '' }}>published
                                                                </option>
                                                                <option value="0"
                                                                    {{ old($input) == '0' ? 'selected' : '' }}>hidden
                                                                </option>

                                                            </select>


                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    @php
                                                    $input = 'youtube';
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> {{ $input }} url</label>
                                                            <input type="url" value="{{ old($input) }}" id="{{ $input }}"
                                                                class="form-control" placeholder="input {{ $input }}   "
                                                                name="{{ $input }}">
                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>




                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @php
                                                        $input = 'playlist_id';
                                                        @endphp
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> playlist </label>
                                                            <select name="{{ $input }}" id="{{ $input }}"
                                                                class="form-control">
                                                                <option disabled selected>select playlist</option>

                                                                @foreach ($playlists as $playlist)
                                                                    <option value="{{ $playlist->id }}"
                                                                        {{ old($input) == $playlist->id ? 'selected' : '' }}>
                                                                        {{ $playlist->name }}</option>
                                                                @endforeach


                                                            </select>


                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">

                                                        @php
                                                        $input = 'order';
                                                        @endphp
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> {{ $input }} video</label>
                                                            <input type="number" value="{{ old($input) }}" id="{{ $input }}"
                                                                class="form-control" placeholder="input {{ $input }}   "
                                                                name="{{ $input }}">
                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>







                                                <div class="row">

                                                    @php
                                                    $input = 'description';
                                                    @endphp

                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> description </label>
                                                            <textarea rows="4" id="{{ $input }}" class="form-control"
                                                                placeholder="input  description   "
                                                                name="{{ $input }}">{{ old($input) }}</textarea>

                                                            @error($input)
                                                            <span class="text-danger">{{ $message }} </span>
                                                            @enderror

                                                        </div>
                                                    </div>

                                                    @php
                                                    $input = 'meta_description';
                                                    @endphp

                                                    <div class="col-md-12">

                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> meta description </label>
                                                            <textarea rows="4" id="{{ $input }}" class="form-control"
                                                                placeholder="input meta description   "
                                                                name="{{ $input }}">{{ old($input) }}</textarea>

                                                            @error($input)
                                                            <span class="text-danger">{{ $message }} </span>
                                                            @enderror

                                                        </div>
                                                    </div>


                                                </div>






                                                <div class="form-actions">
                                                    <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                        <i class="ft-x"></i> back
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> save
                                                    </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>
        $(document).ready(function() {

            $('#playlist_id').select2();

        });

    </script>
@endpush
