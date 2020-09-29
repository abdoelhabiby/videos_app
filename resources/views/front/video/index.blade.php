@extends('layouts.front')


@section('title')

    | {{ $title }}

@endsection

@section('content')

    <div class="section mt-2">

        <div class="container ">

            <div class="jumbotron pt-1">
                <h1 class="display-4 mb-2 h3">Title : {{ $video->name }}</h1>
            </div>

            <div class="row">
                @if (getVideoId($video->youtube))
                    <div class="col-md-12 ">
                        <iframe width="100%" height="500"
                            src="https://www.youtube-nocookie.com/embed/{{ getVideoId($video->youtube) }}" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                @endif


            </div>

            <div class="border p-2 d-flex mt-2 mb-2">

                <p class="mr-3"><i class="fa fa-user"></i> {{ $video->admin->name }} </p>
                <p class="mr-3"><i class="fa fa-list"></i> <a
                        href="{{ route('front.playlist.show', $video->playlist->id) }}">{{ $video->playlist->name }}</a></p>
                <p class="mr-3"><i class="fa fa-clock-o"></i> {{ $video->created_at }} </p>
            </div>

            <div class="next_prev">
                <div class="float-left">
                    @if ($prev)
                        <a href="{{ route('front.playlist.videos.show', $prev->id) }}" class="btn btn-success"><i
                                class="fa fa-arrow-left"></i> {{ $prev->name }} </a>

                    @endif
                </div>
                <div class="float-right">
                    @if ($next)
                        <a href="{{ route('front.playlist.videos.show', $next->id) }}" class="btn btn-success">
                            {{ $next->name }} <i class="fa fa-arrow-right"></i></a>

                    @endif
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="jumbotron pt-1">
                <p>description : </p>
                <p class="pl-2">{{ $video->description }}</p>
            </div>


            {{-- ---------start comments ----------- --}}

            <div id="comments">
                <h5>Comments ({{ $video->comments->count() }}) : </h5>


                <div class="show-comments" style="max-height: 400px; overflow:auto">
                    <table class="table table-dark">
                        <tbody>

                            @foreach ($video->comments as $comment)
                                <tr id="row-{{ $comment->id }}">
                                    <td class="col">
                                        <h5 class="text-white">{{ $comment->user->name }}</h5>
                                        <p id="text_comment">{!! nl2br($comment->comment) !!}</p>
                                        <span>{{ $comment->created_at }}</span>

                                        {{-- ---------form update -------------
                                        --}}

                                        @if ((user() && $comment->user_id == user()->id) || admin())


                                            <div class="form_update " style="display: none"
                                                id="form-update-{{ $comment->id }}">
                                                <form action="{{ route('video.comment.update', $comment->id) }}"
                                                    method="post" id="update_comment">
                                                    @csrf
                                                    @method('put')

                                                    <textarea type="text" rows="2" class="form-control mt-1"
                                                        placeholder="add comment  "
                                                        name="comment">{{ $comment->comment }}</textarea>
                                                    <span class="text-danger" id="comment_error"></span>

                                                    <div>

                                                        <button class="btn btn-primary mt-1" type="submit">update</button>

                                                    </div>

                                                </form>
                                            </div>



                                        @endif



                                    </td>
                                    <td class="col d-flex">
                                        @if ((user() && $comment->user_id == user()->id) || admin())
                                            <a href="javascript:void(0);"
                                                onclick="$('#form-update-{{ $comment->id }}').toggle()"
                                                data-id="{{ $comment->id }}"> <i class="fa fa-edit text-black"></i> </a>



                                            {{-- ---------------------delete
                                            -------------------------
                                            --}}


                                            <a href="javascript:void(0);" data-toggle="modal"
                                                data-target="#modal-delete-{{ $comment->id }}"> <i
                                                    class="fa fa-trash text-danger"></i>
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modal-delete-{{ $comment->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h5 class="modal-title" id="exampleModalLabel">delete comment
                                                            </h5>

                                                        </div>
                                                        <div class="modal-body d-flex justify-content-center">
                                                            <button type="button" class="btn btn-secondary mr-2"
                                                                data-dismiss="modal">Close</button>
                                                            <form id="form_delete" data-id="{{ $comment->id }}"
                                                                action="{{ route('video.comment.destroy', $comment->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">delete</button>
                                                            </form>


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>
                <hr>

                {{--------------------- add new comment----------
                --}}

                @if (user())



                    <form action="{{ route('video.comment.store') }}" method="post">
                        @csrf

                        <input type="hidden" name="video_id" value="{{ $video->id }}">
                        <div class="form-group">
                            @php
                            $input = 'comment';
                            @endphp

                            <textarea type="text" rows="4" id="{{ $input }}" class="form-control"
                                placeholder="add {{ $input }}   " name="{{ $input }}">{{ old($input) }}</textarea>

                            @error('comment')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info">
                                add
                            </button>
                        </div>
                    </form>

                @else
                    pleas login to add comment
                @endif


            </div>

            {{-- ---------end comments ----------- --}}


        </div>
    </div>



@endsection

@section('js')

    <script>
        $(function() {

            $('body').on('submit', '#form_delete', function(e) {
                e.preventDefault();

                var action = $(this).attr('action');
                var id = $(this).data('id');
                var formU = $(this);
                var token = $('meta[name="csrf-token"]').attr('content');



                $.ajax({
                    url: action,
                    method: 'delete',
                    data: {_token : token},
                    beforeSend: function() {
                    },
                    success: function(response) {
                        $('#row-' + id).remove();

                        formU.closest('.modal').modal('hide');
                    }

                })



            });


            $('body').on('submit', '#update_comment', function(e) {
                e.preventDefault();

                var data = $(this).serialize();
                var action = $(this).attr('action');
                var formU = $(this);

                $.ajax({
                    url: action,
                    method: 'put',
                    data: data,
                    beforeSend: function() {
                        $('#comment_error').text('');
                    },
                    success: function(response) {
                        formU.find('#comment_error').text('');


                        var textAreaContent = response.comment.replace(/\r\n/g, "<br>");

                        formU.closest('tr').find(
                            '#text_comment').html(textAreaContent);

                        formU.closest('.form_update').css({
                            'display': 'none'
                        });
                    },
                    error: function(error) {

                        if (error.responseJSON.errors) {
                            formU.find('#comment_error')
                                .text(error.responseJSON
                                    .errors.comment[0]);

                        }

                    }
                });
            })
        })

    </script>

@endsection
