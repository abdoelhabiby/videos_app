@extends('layouts.dashboard')


@php
$model_name = 'notifications';
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
                                        <table class="table display nowrap table-striped table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>title</th>
                                                    <th>read at</th>
                                                    <th>created at</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if ($rows->count() > 0)


                                                    @foreach ($rows as $index => $row)

                                                        <tr>
                                                            <td> {{ orderNumberOfRows() + $index + 1 }}</td>

                                                            <td>
                                                                <a
                                                                    href="{{ route('dashboard.videos.edit', [$row['data']['video_id'], 'noti_id' => $row->id, '#comments']) }}">
                                                                    <div
                                                                        class="media">
                                                                        <div class="media-left align-self-center"><img
                                                                                src="{{ asset($row->data['user']['image']) }}"
                                                                                alt="" width="45" height="45"
                                                                                class="rounded-circle"> </div>
                                                                        <div class="media-body">

                                                                            <p class="notification-text font-small-3 text-muted mt-1 ml-1">
                                                                                {{ $row->data['title'] }}</p>

                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{$row->read_at}}
                                                            </td>
                                                            <td>
                                                                {{$row->created_at}}
                                                            </td>

                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">


                                                                    <button type="button" id="button_delete"
                                                                        data-action="{{ route('admin.notifications.destroy', $row->id) }}"
                                                                        data-name="{{ $row->name }}"
                                                                        class="btn btn-outline-danger  btn-sm box-shadow-3 mr-1 mb-1">
                                                                        <i class="la la-trash"></i>
                                                                    </button>

                                                                </div>

                                                                <i class="la la-automobile"></i>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                @endif







                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">

            {{ $rows->appends(request()->query())->links() }}

        </div>
    </div>



    <!-- Modal delete -->

    @include('dashboard.includes.alerts.model_delete')






@endsection
