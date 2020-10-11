@extends('layouts.front')




@section('title')

    | notifications

@endsection

@section('content')

    <div class="section ">

        <div class="container">
            <div class="title mt-2">
                <h1>notifications</h1>
            </div>




            @if ($rows->count() > 0)


                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">title</th>
                            <th scope="col">read at</th>
                            <th scope="col">created at</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>




                        @foreach ($rows as $row)
                            <tr>
                                <td>
                                    <a style="color: #FFF"
                                        href="{{ route('front.playlist.videos.show', [$row->data['video_id'], 'noti_id' => $row->id, '#comments']) }}">
                                        {{ $row->data['title'] }}
                                    </a>
                                </td>
                                <td>{{ $row->read_at }}</td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>
                                   <a href="javascript:void(0);" data-toggle="modal"
                                    data-target="#modal-delete-{{ $row->id }}"> <i
                                        class="fa fa-trash text-danger"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-delete-{{ $row->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h5 class="modal-title" id="exampleModalLabel">delete notification
                                                </h5>

                                            </div>
                                            <div class="modal-body d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary mr-2"
                                                    data-dismiss="modal">Close</button>
                                                <form id="form_delete" data-id="{{ $row->id }}"
                                                    action="{{ route('user.notifications.destroy', $row->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">delete</button>
                                                </form>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>

                        @endforeach


                    </tbody>
                </table>



            @else

                <div class="d-flex justify-content-center">
                    Notifications count 0
                </div>

            @endif






            <div class="d-flex justify-content-center mt-5">

                {{ $rows->links() }}

            </div>
        </div>
    </div>

@endsection
