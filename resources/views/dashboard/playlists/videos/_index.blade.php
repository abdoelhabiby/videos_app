  <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> {{ $model_name }} ({{ $videos->total() }})</h4>

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
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Published</th>
                                                    <th>Admin</th>
                                                    <th>order</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if ($videos->count() > 0)


                                                    @foreach ($videos as $index => $row)

                                                        <tr>
                                                            <td> {{ orderNumberOfRows() + $index + 1 }}</td>
                                                            <td>{{ $row->name }}</td>
                                                            <td>{{ $row->published ? 'true' : 'false' }}</td>
                                                            <td>{{ $row->admin->name }}</td>
                                                            <td>{{ $row->order }}</td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">

                                                                    <a href="{{ route('dashboard.' . $model_name . '.edit', $row->id) }}"
                                                                        class="btn btn-outline-primary btn-sm  box-shadow-3 mr-1 mb-1">
                                                                        <i class="la la-edit"></i>
                                                                    </a>

                                                                    <button type="button" id="button_delete"
                                                                        data-action="{{ route('dashboard.' . $model_name . '.destroy', $row->id) }}"
                                                                        data-name="{{ $row->name }}"
                                                                        class="btn btn-outline-danger btn-sm box-shadow-3 mr-1 mb-1">
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
                                        <div class="d-flex justify-content-center mt-5">

                                            {{ $videos->appends(request()->query())->links() }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
