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
                                            <li><a data-action="collapse"><i class="ft-plus"></i></a></li>

                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content collapse ">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('dashboard.' . $model_name . '.store') }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="playlist_id" value="{{ $playlist->id }}">


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

                                                    @php
                                                    $input = 'order';
                                                    @endphp

                                                      <div class="col-md-6">
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
