@section('admin_notification_in_include_nav')

    <script>
        $(function() {

            var admin_id = "{{ admin()->id }}";


            window.Echo.private('admin.' + admin_id)
                .listen('.comment-event', (e) => {

                    var noti_count = $("#show_notification").find('.noti_count').text();
                    noti_count = parseInt(noti_count) + 1;

                    $("#show_notification").find('.noti_count').text(noti_count);


                });






            //$("body").on('click','.test', function() {

            $(".get_notifications").click( function() {

                var url = "{{ route('admin.notifications.latest') }}";
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


<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="index.html">
                        <img class="brand-logo" alt="modern admin logo" src="{{ asset('admin/images/logo/logo.png') }}">
                        <h3 class="brand-text">OS</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>

        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="ft-menu"></i></a></li>


                </ul>

                <ul class="nav navbar-nav float-right">

                    <li class=" dropdown dropdown-notification nav-item " id="show_notification">
                        <a class=" nav-link nav-link-label"  href="#" data-toggle="dropdown"><i class="ficon ft-bell get_notifications"></i>
                            <span
                                class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow noti_count">{{admin()->unreadNotifications->count()}}</span>
                        </a>



                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Notifications</span><i class="las la-sync-alt"
                                        style="color:dark"></i>
                                </h6>

                            </li>
                            <li class="scrollable-container media-list w-100">
                                <div class="text-center pb-2 load">Loadding......</div>

                              <div class="appent_notify">

                              </div>

                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                    href="{{route('admin.notifications.index')}}">Read all notifications</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">
                            </i></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <h6 class="dropdown-header m-0">
                                    <span class="grey darken-2">Messages</span>
                                </h6>
                                <span class="notification-tag badge badge-default badge-warning float-right m-0">4
                                    New</span>
                            </li>
                            <li class="scrollable-container media-list w-100">
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="avatar avatar-sm avatar-online rounded-circle">
                                                <img src="{{ asset('admin') }}/images/portrait/small/avatar-s-19.png"
                                                    alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Margaret Govan</h6>
                                            <p class="notification-text font-small-3 text-muted">I like your portfolio,
                                                let's start.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                    datetime="2015-06-11T18:29:20+08:00">Today
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="avatar avatar-sm avatar-busy rounded-circle">
                                                <img src="{{ asset('admin') }}/images/portrait/small/avatar-s-2.png"
                                                    alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Bret Lezama</h6>
                                            <p class="notification-text font-small-3 text-muted">I have seen your work,
                                                there is</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                    datetime="2015-06-11T18:29:20+08:00">Tuesday
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="avatar avatar-sm avatar-online rounded-circle">
                                                <img src="{{ asset('admin') }}/images/portrait/small/avatar-s-3.png"
                                                    alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Carie Berra</h6>
                                            <p class="notification-text font-small-3 text-muted">Can we have call in
                                                this week ?</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                    datetime="2015-06-11T18:29:20+08:00">Friday
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="media">
                                        <div class="media-left">
                                            <span class="avatar avatar-sm avatar-away rounded-circle">
                                                <img src="{{ asset('admin') }}/images/portrait/small/avatar-s-6.png"
                                                    alt="avatar"><i></i></span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Eric Alsobrook</h6>
                                            <p class="notification-text font-small-3 text-muted">We have project party
                                                this saturday.</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                    datetime="2015-06-11T18:29:20+08:00">last month
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                    href="javascript:void(0)">Read all messages</a></li>
                        </ul>
                    </li>


                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link " href="#" data-toggle="dropdown">
                            <span class="mr-1">
                                <span class=" text-bold-700 "> {{admin()->name}}</span>
                            </span>
                            <span class="avatar avatar-online">
                                <img style="height: 35px;" alt="avatar"
                                    src="{{ asset('images/user_default.png') }}"><i></i>
                            </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right pr-1"><a class="dropdown-item" href="{{route('admin.profile')}}"><i
                                    class="ft-user"></i> تعديل الملف الشحصي </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('dashboard.logout') }}"><i class="ft-power"></i>
                                تسجيل
                                الخروج </a>
                        </div>
                    </li>




                </ul>
            </div>
        </div>
    </div>
</nav>
