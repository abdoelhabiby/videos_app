@if ($notifications->count() > 0)

    @foreach ($notifications as $notify)



           <a class="" href="{{ route('front.playlist.videos.show', [$notify['data']['video_id'], 'noti_id' => $notify->id, '#comments']) }}">
            <div class="media {{ !$notify->read_at ? 'unread' : '' }}">
                <div class="media-body mt-1 ml-1">
                    <p class="notification-text font-small-3 text-muted">
                        {{ $notify->data['title'] }}</p>
                    <small>
                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"> {{ $notify->created_at }}
                        </time>
                    </small>
                </div>
            </div>
        </a>
        <hr>

    @endforeach

@else


    <div class="text-center">
        <p>notification 0</p>
    </div>


@endif


