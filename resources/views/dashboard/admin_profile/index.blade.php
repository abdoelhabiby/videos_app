@extends('layouts.dashboard')


@php
$model_name = 'profile';
@endphp


@section('title')
    | dashboard | {{ $model_name }}
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
                                <li class="breadcrumb-item active"> {{ $model_name }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')

                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{ $model_name }}</h4>

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
                                    <div class="card-body card-dashboard">

                                        <div class="details">
                                            <p>Name : {{ admin()->name }}</p>
                                            <p>E-mail : {{ admin()->email }}</p>
                                        </div>


                                        <div class="row mt-4">
                                            <div class="col-md-6 ml-auto mr-auto text-center">
                                                <btn class="btn btn-outline-warning btn-round"
                                                    onclick="$('#setting_acount').toggle()"><i class="la la-cog"></i>
                                                    Setting Acount</btn>
                                            </div>
                                        </div>

                                        <br />

                                        <div class="setting-acount " id="setting_acount" style="display:none;">




                                            <div class="row">
                                                <div class="col-md-6 ml-auto mr-auto">

                                                    <form action="{{ route('admin.profile.update') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('put')
                                                        <div class=" row">

                                                            <div class="form-group col-md-6">
                                                                <label for="name">Name</label>
                                                                <input type="text" value="{{ admin()->name }}" name="name"
                                                                    id="name" class="form-control">
                                                                @error('name')
                                                                <span class="text-danger">{{ $message }}</span>

                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="email">E-mail</label>
                                                                <input type="text" value="{{ admin()->email }}" name="email"
                                                                    id="email" class="form-control">
                                                                @error('email')
                                                                <span class="text-danger">{{ $message }}</span>

                                                                @enderror
                                                            </div>

                                                            @php
                                                            $input = 'password';
                                                            @endphp

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="{{ $input }}"> {{ $input }} </label>
                                                                    <input type="password" id="{{ $input }}"
                                                                        class="form-control"
                                                                        placeholder="input {{ $input }}   "
                                                                        name="{{ $input }}">
                                                                    @error($input)
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                    @enderror

                                                                </div>
                                                            </div>
                                                            @php
                                                            $input = 'password_confirmation';
                                                            @endphp
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="{{ $input }}"> password confermation
                                                                    </label>
                                                                    <input type="password" id="password_confirmation"
                                                                        class="form-control"
                                                                        placeholder="input password confermation   "
                                                                        name="{{ $input }}">
                                                                    @error($input)
                                                                    <span class="text-danger">{{ $message }} </span>
                                                                    @enderror

                                                                </div>
                                                            </div>


                                                            <div class="form-group col-12">
                                                                <button type="submit" class="btn btn-info">Save</button>
                                                            </div>



                                                        </div>
                                                    </form>


                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>










@endsection
