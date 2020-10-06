@extends('layouts.front')

@section('title')

    | {{ $title ?? '' }}
@endsection

@section('content')


    <div class=" mt-4 page-header page-header-xs" data-parallax="true"
        style="background-image: url('{{ asset('front') }}/img/fabio-mangione.jpg');">
        <div class="filter"></div>
    </div>
    <div class="section profile-content">
        <div class="container">
            <div class="owner">
                <div class="avatar">
                    <img src="{{ asset($profile->image) }}" alt="Circle Image"
                        class="img-circle img-no-padding img-responsive">
                </div>
                <div class="name">
                    <h4 class="title">{{ $profile->name }}
                        <br />
                    </h4>
                    <h6 class="description">{{ $profile->email }}</h6>
                </div>
            </div>


            {{-- --------------------my profile -----------------
            --}}

            @if (user() && user()->id == $profile->id)


                <div class="row mt-4">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                        <btn class="btn btn-outline-default btn-round" onclick="$('#setting_acount').toggle()"><i
                                class="fa fa-cog"></i> Setting Acount</btn>
                    </div>
                </div>

                <br />

                <div class="setting-acount" id="setting_acount" style="display:none;">


                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#update-details" role="tab">update
                                        details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#change-password" role="tab">Change
                                        Pasword</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content following">
                        <div class="tab-pane active" id="update-details" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 ml-auto mr-auto">

                                    <form action="{{ route('front.profile.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class=" row">

                                            <div class="form-group col-12">
                                                <label for="name">Name</label>
                                                <input type="text" value="{{ user()->name }}" name="name" id="name"
                                                    class="form-control">
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                            </div>

                                            <div class="form-group col-12">
                                                <label for="email">E-mail</label>
                                                <input type="text" value="{{ user()->email }}" name="email" id="email"
                                                    class="form-control">
                                                @error('email')
                                                <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                            </div>
                                            <div class="form-group col-12">
                                                <label for="image">Photo</label>
                                                <input type="file" name="image" id="image" class="form-control">
                                                @error('image')
                                                <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                            </div>

                                            <div class="form-group col-12">
                                                <button type="submit" class="btn btn-info">Save</button>
                                            </div>



                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="tab-pane" id="change-password" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4 ml-auto mr-auto">

                                    <form action="{{route('front.profile.password')}}" method="post">
                                        @csrf
                                        @method('put')

                                        <div class="row">

                                            <div class="form-group col-12">
                                                @php
                                                $input = 'old_password';
                                                @endphp
                                                <label for="{{ $input }}">Old Password</label>
                                                <input type="password" name="{{ $input }}" id="{{ $input }}"
                                                    class="form-control">
                                                @error($input)
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                @if(session()->has('old_password'))
                                                     <span class="text-danger">{{ session('old_password') }}</span>

                                                @endif
                                            </div>

                                            <div class="form-group col-12">
                                                @php
                                                $input = 'password';
                                                @endphp
                                                <label for="{{ $input }}">New Password</label>
                                                <input type="password" name="{{ $input }}" id="{{ $input }}"
                                                    class="form-control">
                                                @error($input)
                                                <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                            </div>

                                            <div class="form-group col-12">
                                                @php
                                                $input = 'password_confirmation';
                                                @endphp
                                                <label for="{{ $input }}">Password Confirmation</label>
                                                <input type="password" name="{{ $input }}" id="{{ $input }}"
                                                    class="form-control">
                                                @error($input)
                                                <span class="text-danger">{{ $message }}</span>

                                                @enderror
                                            </div>

                                            <div class="form-group col-12">

                                                <button type="submit" class="btn btn-warning">Update Password</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

            {{-- --------------------my profile -----------------
            --}}

        </div>
    </div>
@endsection
