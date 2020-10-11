@section('user_notify')

    <script>
        $(function() {


            var user_id = "{{ user() ? user()->id : null }}";


             window.Echo.private('channel-comment-reply.' + user_id)
                .listen('.comment-reply', (e) => {

                    var noti_count = $("#show_notification").find('.noti_count').text();
                    noti_count = parseInt(noti_count) + 1;

                    $("#show_notification").find('.noti_count').text(noti_count);

                    console.log(e);

                });






            //$("body").on('click','.test', function() {

            $(".get_notifications").click( function() {

                var url = "{{route('user.notifications.latest')}}";
                var token = "{{ csrf_token() }}";



                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        _token: token
                    },
                    beforeSend: function() {
                        $(".load").removeClass('d-none');

                    },
                    success: function(response) {

                        $(".appent_notify").empty();
                        $(".appent_notify").append(response.lists);

                        $(".load").addClass('d-none');

                    }

                })

            })



        }); //end start jquery

    </script>

@endsection




<nav class="navbar navbar-expand-lg fixed-top navbar-transparent "
    color-on-scroll="{{ request()->url() == route('welcome') ? '150' : '-1' }}">
    <div class="container">
        <div class="navbar-translate d-flex">
            <a class="navbar-brand" href="{{ route('welcome') }}" rel="tooltip" data-placement="bottom">
                Videos App v1
            </a>

            <div class="form-search mt-1">
                <form action="{{ route('front.playlist_video.search') }}" method="get" class="d-flex">
                    <input type="text" name="search" value="{{ trim(request()->search) }}" placeholder="search.."
                        class="form-control" style="margin-top: 13px;height:34px">

                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-search"></i></button>

                </form>
            </div>

            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">


                {{-- -------------start notification ---------------
                --}}

                @if(user())
                <li class=" dropdown dropdown-notification nav-item " id="show_notification">
                    <a class=" nav-link nav-link-label get_notifications" href="#" data-toggle="dropdown">
                        <i class="fa fa-bell "></i>
                        <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow noti_count">
                            {{ user()->unreadNotifications->count() }}</span>
                    </a>



                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right p-1" >
                        <li class="dropdown-menu-header">
                            <h6 class="dropdown-header m-0">
                                <span class="grey darken-2">Notifications</span>
                            </h6>

                        </li>
                        <li class="scrollable-container media-list w-100" style="max-height:300px;overflow:auto">
                            <div class="text-center pb-2 load">Loadding......</div>

                            <div class="appent_notify">

                            </div>

                        </li>
                        <li class="dropdown-menu-footer">
                           <hr> <a class="dropdown-item text-muted text-center"
                                href="{{route('user.notifications.index')}}">Read all notifications</a>
                        </li>
                    </ul>
                </li>

                @endif

                {{-- -------------------- --}}

                <li class="nav-item">
                    <a href="{{ route('front.playlist.index') }}" class="nav-link">playlists</a>
                </li>
                <li class="nav-item">
                    <!-- Drop Down Categories -->
                    <div class="btn-group">
                        <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu">

                            @foreach (App\Models\Category::select('id', 'name')->get() as $category)
                                <a class="dropdown-item"
                                    href="{{ route('front.category.show', $category->id) }}">{{ $category->name }}</a>

                            @endforeach


                        </div>
                    </div>
                </li>



                <li class="nav-item">
                    <!-- DropDown Skils -->
                    <div class="btn-group">
                        <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Skils
                        </a>
                        <div class="dropdown-menu">
                            @foreach (App\Models\Skill::select('id', 'name')->get() as $skill)
                                <a class="dropdown-item"
                                    href="{{ route('front.skills.show', $skill->id) }}">{{ $skill->name }}</a>

                            @endforeach

                        </div>
                    </div>
                </li>




                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">login</a>
                    </li>



                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">register</a>
                    </li>

                @else

                    <li class="nav-item">

                        <!-- DropDown user -->
                        <div class="btn-group">
                            <a type="button" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ auth()->user()->name }} <img
                                                src="{{asset(auth()->user()->image) }}" alt="" width="25"
                                                height="25" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ route('front.profile', [user()->id, pageNameReplaceespace(user()->name)]) }}"
                                    class="dropdown-item">Profile</a>

                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('submit_logout').submit()"
                                    class="dropdown-item">logout</a>

                                <form action="{{ route('logout') }}" id="submit_logout" method="POST">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </li>

                @endguest



            </ul>
        </div>
    </div>
</nav>
