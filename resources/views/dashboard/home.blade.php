@extends('layouts.dashboard')

@section('title')
    | dashboard
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

                                <li class="breadcrumb-item active">الرئيسه </li>
                            </ol>
                        </div>
                    </div>

                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')


                <div id="crypto-stats-3" class="row">

                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="playists"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>playists</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{$playlists}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="videos"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>videos</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{$videos}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="users"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>users</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{$users}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                           <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="skills"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>skills</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{$skills}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="categories"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>categories</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{$categories}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


            </div>
        </div>
    </div>
@endsection
