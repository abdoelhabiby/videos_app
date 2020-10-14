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
                            </li>
                            <li class="breadcrumb-item active">actions
                            </li>
                        </ol>
                    </div>
                </div>

                @include('dashboard.includes.alerts.success')
                @include('dashboard.includes.alerts.errors')







                <div class="container" style="background: #FFF;padding-top: 20px;">

                    {!! $dataTable->table() !!}
                </div>


                @push('scripts')
                    {{-- <script
                        src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"> </script>
                    --}}
                    <script src="/vendor/datatables/buttons.server-side.js"></script>
                    {!! $dataTable->scripts() !!}





                @endpush

            @section('js')
                <script>
                    $(function() {



                        //-----------------delete record -------------------
                        $(document).on('click', '.delete_log', function() {

                            var record_id = $(this).data('id');
                            var token = "{{ csrf_token() }}";
                            var url = "/dashboard/logs/actions/" + record_id;


                            swal({
                                title: 'Are you sure?',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#6B6F82',
                                confirmButtonText: 'Yes, delete it!'
                            }).then(function(result) {

                                if (result.value == true) {

                                    $.ajax({
                                        url: url,
                                        method: 'delete',
                                        data: {
                                            _token: token
                                        },
                                        beforeSend: function() {

                                        },
                                        success: function(response) {

                                            $('#logsactions-table').DataTable().ajax.reload();

                                            swal( {
                                                title:'succes delete',
                                                type: "success",
                                                timer: 1000,
                                                });


                                        }
                                    })





                                }
                            });






                        }); //end click

                    })

                </script>
            @endsection




        </div>
    </div>
</div>
@endsection
