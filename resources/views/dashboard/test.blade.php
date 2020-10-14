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









                <button type="button">Click Me!</button>


            @section('js')


                <script>
                    $(function() {


                        $("button").click(function() {

                            swal({
                                title: 'Are you sure?',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then(function(result) {

                                if(result.value == true){
                                    console.log('is true');
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
