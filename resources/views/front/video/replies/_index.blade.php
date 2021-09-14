
    @foreach ($replies as $reply)

        @php
        $id =$reply->id;
        @endphp
        <div class="row-reply row-id-{{ $id }}">
            <h5>(admin) {{ $reply->admin->name }}</h5>
            <p class="reply-text">{{ $reply->reply }}</p>
            
            @if (auth('admin')->user())
            
                <div class="d-flex">
                    {{-- ------------update reply--------- --}}

                    <a href="javascript:void(0);" onclick="$('#form-update-reply-{{ $id }}').toggle()"> <i
                            class="fa fa-edit "></i> </a>

                    {{-- ---------------------delete ------- --}}

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-delete-reply-{{ $id }}"> <i
                            class="fa fa-trash text-danger"></i>
                    </a>

                    {{-- ---------------------delete ---- --}}
                </div>
            
            @endif()

            <div class="form-update-replay">

                {{-- ------------ updtae reply----------- --}}


                <form class="update_reply" action="{{ route('front.comment.reply.update', $id) }}" method="post"
                    style="display: none; border:1px solid#FFF;padding:12px" id="form-update-reply-{{ $id }}">
                    @csrf
                    @method('put')

                    <label for="">update reply </label>

                    <textarea type="text" rows="4" class="form-control mt-1" placeholder="add reply  "
                        name="reply">{{ $reply->reply }}</textarea>

                    <span class="text-danger text-error"></span>

                    <div>
                        <button class="btn btn-primary mt-1" type="submit">update</button>

                    </div>


                </form>
                {{-- ------------ updtae reply-----------
                --}}
            </div>



            <!-- Modal delete-->

            <div class="modal modal-delete fade" id="modal-delete-reply-{{ $id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <h5 class="modal-title" id="exampleModalLabel"> delete reply</h5>



                        </div>
                        <div class="modal-body d-flex justify-content-center">
                            <form class="delete-row" action="{{ route('dasboard.comment.reply.destroy', $id) }}"
                                data-id="{{ $id }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>

                            </form>
                            <button type="button" class="btn btn-secondary ml-1" data-dismiss="modal">Close</button>

                        </div>

                    </div>
                </div>
            </div>

            {{-- end modal --}}

        </div>

        @if (!$loop->last)
            <hr>
        @endif






    @endforeach




@section('js')
    <script>
        $(function() {

            //-------------------delete reply ----------------------------------

          //  $('.delete-row').submit(function(e) {
            $('body').on('submit','.delete-row',function(e) {

                e.preventDefault();

                var action = $(this).attr('action');
                var id = $(this).data('id');
                var form = $(this);
                var token = $('meta[name="csrf-token"]').attr('content');


                //-------------neeed to update -------------------
                //------get replies count -----
                var comment_id = "{{$comment->id}}";

                var getcountreply = $('tr#row-' + comment_id).find('span.replies_count').text();

               //-------------neeed to update -------------------



                $.ajax({
                    url: action,
                    method: 'delete',
                    data: {
                        _token: token
                    },
                    beforeSend: function() {},
                    success: function(response) {

                        form.closest('.modal-delete').modal('hide');
                        {{-- var replies_count = form.closest('.replies').find('span.replies_count')
                            .text(); --}}

                        var replies_count = parseInt(getcountreply);


                        if (replies_count >= 1) {

                            $('tr#row-' + comment_id).find('span.replies_count').text(
                                replies_count - 1);

                            if ((replies_count - 1) == 0) {

                                setTimeout(function() {
                                    $('tr#row-' + comment_id).find('.replies').remove();
                                }, 400);



                            }
                        }





                        $('.row-id-' + id).remove();
                    }

                })



            });

            //-------------------delete reply ----------------------------------

            //------------------------- update reply -------------------------

            $('.update_reply').submit(function(e) {
                e.preventDefault();

                var action = $(this).attr('action');
                var data = $(this).serialize();
                var form = $(this);

                $.ajax({
                    url: action,
                    method: 'put',
                    data: data,
                    beforeSend: function() {
                        $('.text-error').text('');
                    },
                    success: function(response) {

                        form.find('.text-error').text('');
                        form.closest('.row-reply').find('.reply-text').text(response.reply);
                        form.css({
                            'display': 'none'
                        });
                    },
                    error: function(error) {

                        if (error.responseJSON.errors) {

                            form.find('.text-error').text(error.responseJSON.errors.reply[0]);
                        }

                    }
                });

            });
            //------------------------- update reply -------------------------

        });

    </script>


@endsection
