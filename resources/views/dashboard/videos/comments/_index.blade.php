<div class="card" style="border: 1px solid #DDD;overflow:auto ;" id="comments">



    <div class="card-body">

        <h5 class="card-title">All Comments : {{ $comments->count() }}</h5>


        @foreach ($comments as $comment)

            <div class="row mb-1">

                <div class="col-md-11 ">
                    <h5>{{ $comment->user->name }}</h5>
                    <p>{{ $comment->comment }}</p>
                    <span>{{ $comment->created_at }}</span>

                    {{-- ----------------start reply ----------------
                    --}}
                    @if ($comment->replies->count() > 0)
                        <div class="replies ml-1 ml-1 pt-2">

                            <a href="javascript:void(0);" onclick="$('#replies-{{ $comment->id }}').toggle()">
                                replies <span class="replies_count"> {{ $comment->replies->count() }}</span> <i class="la la-arrow-down la-sm"
                                    style="font-size: 14px !important ;"></i> </a>


                            <div class=" p-1" id="replies-{{ $comment->id }}" style="display: none">

                                @include('dashboard.videos.comments.shared.replies._index', ['replies' =>
                                $comment->replies])

                            </div>



                        </div>


                    @endif

                    {{-- ----------------end reply ----------------
                    --}}

                    {{-- ------------ updtae comment-----------
                    --}}
                    <div class="form_update " style="display: none; border:1px solid#FFF;padding:12px"
                        id="form-update-{{ $comment->id }}">
                        <form action="{{ route('dasboard.video.comment.update', $comment->id) }}" method="post">
                            @csrf
                            @method('put')

                            <label for="">update comment</label>

                            <textarea type="text" rows="4" class="form-control mt-1" placeholder="add comment  "
                                name="comment">{{ $comment->comment }}</textarea>

                            <div>
                                <button class="btn btn-primary mt-1" type="submit">update</button>

                            </div>

                            @error('comment')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                    </div>
                    {{-- ------------ updtae comment-----------
                    --}}


                    {{-- ------------ reply comment-----------
                    --}}
                    <div class="form_reply " style="display: none; border:1px solid#FFF;padding:12px"
                        id="form-reply-{{ $comment->id }}">
                        <form action="{{ route('dasboard.comment.reply.store', $comment->id) }}" method="post">
                            @csrf

                            <label for="" class="text-white">reply for comment</label>

                            <textarea type="text" rows="4" class="form-control mt-1" placeholder="add reply  "
                                name="reply"></textarea>

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

                </div>



                <div class="col-md-1 ">


                    <a href="javascript:void(0);" onclick="$('#form-update-{{ $comment->id }}').toggle()"> <i
                            class="la la-edit d-block "></i> </a>

                    {{--------------------- reply comment ---------------
                    --}}
                    <a href="javascript:void(0);" onclick="$('#form-reply-{{ $comment->id }}').toggle()"> <i
                            class="la la-reply d-block "></i> </a>



                    {{-- ---------------------delete -------------------------
                    --}}


                    <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-delete-{{ $comment->id }}"> <i
                            class="la la-trash text-danger"></i>
                    </a>

                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal-delete-{{ $comment->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-dark">
                                delete comment
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="{{ route('dasboard.video.comment.destroy', $comment->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary">delete</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
        @endforeach



        </tbody>
        </table>



    </div>
</div>


@section('js')
@endsection
