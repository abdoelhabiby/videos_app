@extends('layouts.dashboard')


@php
$model_name = 'contacts';
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
                                    show
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
                                    <h4 class="card-title" id="basic-layout-form"> name : {{ $contact->name }} | email : {{ $contact->email }} </h4>
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

                                        <div class="message">
                                            <h4>Message: </h4>
                                            <p>
                                                {{ $contact->message }}
                                            </p>

                                            @if ($contact->replies->count() > 0)

                                                @foreach ($contact->replies as $reply)
                                                <hr>

                                                    <div class="prev-replies">
                                                        <h4>prev replies: </h4>
                                                        <h5>admin : {{$reply->admin->name}}</h5>
                                                        <p>
                                                            {{ $reply->reply }}
                                                        </p>

                                                        <p>{{$reply->created_at}}</p>


                                                        <form action="{{route('dashboard.contact.reply.destroy' ,$reply->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                        </form>


                                                    </div>

                                                @endforeach



                                            @endif
                                        </div>

                                        <form class="form" action="{{ route('dashboard.contact.reply', $contact->id) }}"
                                            method="post">
                                            @csrf

                                            <div class="form-body">
<hr>

                                                <div class="row">

                                                    @php
                                                    $input = 'reply';
                                                    @endphp
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="{{ $input }}"> add {{ $input }} </label>

                                                            <textarea name="{{ $input }}" id="{{ $input }}" rows="6"
                                                                class="form-control"> {{ old($input) }}</textarea>

                                                            @error($input)
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>







                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="la la-check-square-o"></i> send
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
