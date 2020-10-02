<div id="comments">
    <h5>Comments (<span class="comments_count">{{ $video->comments->count() }}</span>) : </h5>


    <div class="show-comments" style="max-height: 600px; overflow:auto">
        <table class="table table-dark">
            <tbody>

                @foreach ($video->comments as $comment)
                    <tr id="row-{{ $comment->id }}">
                        <td class="col">
                            <h5 class="text-white">{{ $comment->user->name }}</h5>
                            <p id="text_comment">{!! nl2br($comment->comment) !!}</p>
                            <span>{{ $comment->created_at }}</span>

                            <div class="replies ml-1 ml-1 pt-2">

                                @if ($comment->replies->count() > 0)

                                    <a href="javascript:void(0);" onclick="$('#replies-{{ $comment->id }}').toggle()">
                                        replies <span class="replies_count">
                                            {{ $comment->replies->count() }}</span> <i class="la la-arrow-down la-sm"
                                            style="font-size: 14px !important ;"></i> </a>


                                    <div class=" p-1" id="replies-{{ $comment->id }}" style="display: none">

                                        @include('front.video.replies._index', ['replies'
                                        =>
                                        $comment->replies])

                                    </div>

                                @endif

                            </div>

                            {{-- ----------------end reply ----------------
                            --}}



                            {{-- ---------form update -------------
                            --}}

                            @if ((user() && $comment->user_id == user()->id) || admin())


                                <div class="form_update " style="display: none" id="form-update-{{ $comment->id }}">
                                    <form class="test_update" action="{{ route('video.comment.update', $comment->id) }}"
                                        method="post" id="update_comment">
                                        @csrf
                                        @method('put')
                                        <hr>
                                        <label for="">update comment</label>

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

                            @if (admin())

                                {{-- ------------ reply comment-----------
                                --}}
                                <div class="form_reply " style="display: none; border:1px solid#FFF;padding:12px"
                                    id="form-reply-{{ $comment->id }}">
                                    <form action="{{ route('front.comment.reply.store', $comment->id) }}" method="post">
                                        @csrf

                                        <label for="">reply for comment</label>

                                        <textarea type="text" rows="4" class="form-control mt-1"
                                            placeholder="add reply  " name="reply"></textarea>

                                        <div>
                                            <button class="btn btn-primary mt-1" type="submit">reply</button>

                                        </div>

                                        @error('reply')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </form>
                                </div>
                                {{-- ------------ reply comment-----------
                                --}}

                            @endif



                        </td>
                        <td class="col d-flex">
                            @if ((user() && $comment->user_id == user()->id) || admin())
                                <a href="javascript:void(0);" onclick="$('#form-update-{{ $comment->id }}').toggle()"
                                    data-id="{{ $comment->id }}"> <i class="fa fa-edit text-black"></i> </a>



                                {{-- --------------delete-----------
                                --}}


                                <a href="javascript:void(0);" data-toggle="modal"
                                    data-target="#modal-delete-{{ $comment->id }}"> <i
                                        class="fa fa-trash text-danger"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="modal-delete-{{ $comment->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                {{-- ------------delete
                                --}}

                            @endif

                            @if (admin())

                                {{--------------- reply comment
                                --}}
                                <a href="javascript:void(0);" onclick="$('#form-reply-{{ $comment->id }}').toggle()"> <i
                                        class="fa fa-reply d-block pt-1"></i> </a>

                                {{--------------- reply comment
                                --}}



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

                <textarea type="text" rows="4" id="{{ $input }}" class="form-control" placeholder="add {{ $input }}   "
                    name="{{ $input }}">{{ old($input) }}</textarea>

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


@push('scripts')

    <script>
        $(function() {



            //-----------------------update delete comment ---------------


            $('body').on('submit', '#form_delete', function(e) {

                e.preventDefault();

                var action = $(this).attr('action');
                var id = $(this).data('id');
                var formU = $(this);
                var token = $('meta[name="csrf-token"]').attr('content');

                var replies_count = $(".comments_count").text();
                replies_count = parseInt(replies_count);






                $.ajax({
                    url: action,
                    method: 'delete',
                    data: {
                        _token: token
                    },
                    beforeSend: function() {},
                    success: function(response) {

                        if (replies_count >= 1) {

                            $(".comments_count").text(replies_count - 1);

                            if ((replies_count - 1) == 0) {
                                $(".comments_count").text(0);
                            }
                        }

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

@endpush
