<div class="card" style="border: 1px solid #DDD;overflow:auto ;max-height:350px">

    <div class="card-body">

        <h5 class="card-title">All Comments : {{ $comments->count() }}</h5>

        <table class="tabel table table-dark">
            <tbody>

                @foreach ($comments as $comment)
                    <tr>
                        <td class="col">
                            <h5 class="text-white">{{ $comment->user->name }}</h5>
                            <p>{{ $comment->comment }}</p>
                            <span>{{ $comment->created_at }}</span>
                        </td>
                        <td class="col">
                            <a href=""> <i class="la la-edit text-black"></i> </a>

                                <a href="{{ route('dasboard.video.comment.destroy', $comment->id) }}"> <i class="la la-trash text-danger"></i> </a>

                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>



    </div>
</div>
