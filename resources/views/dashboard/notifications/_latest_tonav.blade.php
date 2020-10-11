@if ($notifications->count() > 0)

@foreach($notifications as $notify)

<a href="{{route('dashboard.videos.edit',[$notify['data']['video_id'],'noti_id' => $notify->id, '#comments'])}}">
        <div class="media {{!$notify->read_at ? 'unread' : '' }}">
            <div class="media-left align-self-center"><img src="{{asset($notify->data['user']['image'])}}" alt="" width="45" height="45" class="rounded-circle"> </div>
            <div class="media-body">
                <h6 class="media-heading">You have new notification!</h6>
                <p class="notification-text font-small-3 text-muted">{{ $notify->data['title'] }}</p>
                <small>
                    <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00"> {{ $notify->created_at }}
                    </time>
                </small>
            </div>
        </div>
    </a>

@endforeach

@else


<div class="text-center">
    <p>notification 0</p>
</div>


@endif


{{-- <a href="javascript:void(0)">
    <div class="media">
        <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
        <div class="media-body">
            <h6 class="media-heading">Generate monthly report</h6>
            <small>
                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month
                </time>
            </small>
        </div>
    </div>
</a> --}}
