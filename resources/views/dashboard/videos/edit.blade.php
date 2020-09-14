@extends('layouts.dashboard')


@php
$model_name = 'videos';
@endphp

@section('title')
    | dashboard | {{ $model_name }} | edit
@endsection





@section('content')


    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.home') }}">home </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard.' . $model_name . '.index') }}">
                                        {{ $model_name }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    edit
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
                                    <h4 class="card-title mb-2" id="basic-layout-form"> edit {{ $row->name }} </h4>

                                    <div class="img-video row">
                                        <div class="show-image col-md-5">
                                            <img src="{{ asset($row->image) }}" alt="" width="90%" height="350">
                                        </div>

                                        @if (getVideoId($row->youtube))
                                            <div class="col-md-7 ">
                                                <iframe width="90%" height="350"
                                                    src="https://www.youtube-nocookie.com/embed/{{ getVideoId($row->youtube) }}"
                                                    frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        @endif

                                    </div>


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
                                        <form class="form"
                                            action="{{ route('dashboard.' . $model_name . '.update', $row->id) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

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
                                                            <input type="text" value="{{ $row->$input }}" id="{{ $input }}"
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
                                                            <input type="text" value="{{ $row->$input }}" id="{{ $input }}"
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
                                                    $input = 'category_id';
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> category </label>
                                                            <select name="{{ $input }}" id="{{ $input }}"
                                                                class="form-control">
                                                                @if (App\Models\Category::select('name', 'id')->count() > 0)
                                                                    <option disabled>select category</option>
                                                                    @foreach (App\Models\Category::select('name', 'id')->get() as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $category->id == $row->category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>


                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    @php
                                                    $input = 'published';
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> published </label>
                                                            <select name="{{ $input }}" id="{{ $input }}"
                                                                class="form-control">

                                                                <option value="1"
                                                                    {{ $row->published == '1' ? 'selected' : '' }}>published
                                                                </option>
                                                                <option value="0"
                                                                    {{ $row->published == '0' ? 'selected' : '' }}>hidden
                                                                </option>

                                                            </select>


                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                </div>



                                                <div class="row">

                                                    @php
                                                    $input = 'skills';
                                                    @endphp
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="overflow: hidden">
                                                            <label for="{{ $input }}"> {{ $input }} </label>
                                                            <select name="{{ $input }}[]" id="{{ $input }}" multiple
                                                                style="height: 100px" class="form-control skills-multiple">

                                                                @if ($skills->count() > 0)

                                                                    <option disabled value="0">select skills</option>
                                                                    @foreach ($skills as $skill)
                                                                        <option value="{{ $skill->id }}"
                                                                            {{ in_array($skill->id, $video_skills) ? 'selected' : '' }}>
                                                                            {{ $skill->name }}
                                                                        </option>
                                                                    @endforeach

                                                                @endif

                                                            </select>


                                                            @error('skills.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>





                                                </div>

                                                <div class="row">
                                                    @php
                                                    $input = 'tags';
                                                    @endphp
                                                    <div class="col-md-12">
                                                        <div class="form-group" style="overflow: hidden">

                                                            <label for="{{ $input }}"> {{ $input }} </label>
                                                            <select name="{{ $input }}[]" id="{{ $input }}" multiple
                                                                style="height: 100px; " class="form-control tags-multiple">

                                                                @if ($tags->count() > 0)

                                                                    <option disabled value="0">select tags</option>
                                                                    @foreach ($tags as $tag)
                                                                        <option value="{{ $tag->id }}"
                                                                            {{ in_array($tag->id, $video_tags) ? 'selected' : '' }}>
                                                                            {{ $tag->name }}
                                                                        </option>
                                                                    @endforeach

                                                                @endif

                                                            </select>


                                                            @error('tags.0')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class="row">


                                                    @php
                                                    $input = 'youtube';
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> {{ $input }} url</label>
                                                            <input type="url" value="{{ $row->$input }}" id="{{ $input }}"
                                                                class="form-control" placeholder="input {{ $input }}   "
                                                                name="{{ $input }}">
                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    @php
                                                    $input = 'image';
                                                    @endphp
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> {{ $input }} </label>
                                                            <input type="file" id="{{ $input }}" class="form-control"
                                                                placeholder="select image   " name="{{ $input }}">
                                                            @error($input)
                                                            <span class="text-danger">{{ $message }} </span>
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
                                                            <label for="{{ $input }}"> {{ $input }} </label>
                                                            <textarea rows="4" id="{{ $input }}" class="form-control"
                                                                placeholder="input  description   "
                                                                name="{{ $input }}">{{ $row->$input }}</textarea>

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
                                                                name="{{ $input }}">{{ $row->$input }}</textarea>

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




               {{-- ----------------------------start comments------------------------------- --}}

                                        <div class="comments">
                                            <hr>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    @include('dashboard.videos.comments._create')
                                                </div>
                                                <div class="col-md-6">
                                                     @include('dashboard.videos.comments._index')
                                                </div>
                                            </div>
                                        </div>


               {{-- -----------------------------end comments------------------------------ --}}

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
            $('.skills-multiple').select2();
            $('.tags-multiple').select2();
        });

    </script>
@endpush
