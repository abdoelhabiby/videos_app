@extends('layouts.dashboard')

@section('title')
    | dashboard | logs | actions
@endsection

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="row breadcrumbs">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('logs.actions.index') }}">actions</a>
                            </li>
                            </li>
                            <li class="breadcrumb-item active">actions
                            </li>
                        </ol>
                    </div>
                </div>

                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')







                <div class="container" style="background: #FFF;padding-top: 20px;">

                    <div class="description">
                        <h4>{{ $activity->description }}</h4>
                        <p> model : {{ $activity->subject_type }}</p>
                        <p>recorde id : {{ $activity->subject_id }}</p>
                        <hr>
                    </div>




                    <div class="row p-1">
                        <div class="col-md-12 causer-by  p-1 ">
                            <h5>this action Done by : </h5>

                            <div class="row">
                                <p class="col-md-4">model : {{ $activity->causer_type }}</p>
                                <p class="col-md-4">name : {{ $activity->causer->name }}</p>
                                <p class="col-md-4">email : {{ $activity->causer->email }}</p>
                            </div>
                            <hr>
                        </div>


                        <div class="col-md-12">
                            {{-- ------- properties --}}

                            {{-- attributes --}}
                            @if (array_key_exists('attributes', $properties))

                                @if (count($properties['attributes']) > 0)

                                    <div class="attributes">
                                        <h5>attributes : </h5>
                                        @foreach ($properties['attributes'] as $key => $value)

                                            <div class="column ">
                                                <p class="font-weight-bold" style="display: inline"> {{ $key }} : </p> <span
                                                    class="ml-1" style="display: inline"> {{ '  ' . $value }}</span><br>

                                            </div>

                                        @endforeach
                                    </div>
                                @endif


                            @endif

                            {{-- ------------old ------------ --}}
                            @if (array_key_exists('old', $properties))

                                @if (count($properties['old']) > 0)

                                    <div class="old">
                                        <hr>
                                        <h5>old : </h5>
                                        @foreach ($properties['old'] as $key => $value)

                                            <div class="column d-flex">
                                                <p class="font-weight-bold"> {{ $key }} : </p> <span class="ml-1">
                                                    {{ '  ' . $value }}</span><br>

                                            </div>

                                        @endforeach
                                    </div>
                                @endif


                            @endif



                        </div>

                    </div>




                </div>









            </div>
        </div>
    </div>
@endsection
