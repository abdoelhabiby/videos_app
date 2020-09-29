<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li
                class="nav-item {{ request()->segment(1) == 'dashboard' && request()->segment(2) == null ? 'active' : '' }}">
                <a href="{{ route('dashboard.home') }}"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="nav.add_on_drag_drop.main">Home </span></a>
            </li>

            {{-- ------------------------start nav item admins------------------------
            --}}

            @if (auth('admin')->user()->group == 'super_admin')


                @php
                $module_name = 'admins';
                @endphp
                <li class="nav-item isActive($module_name) }}">

                    <a href=""><i class="la la-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.main"> {{ ucfirst($module_name) }}</span>
                        <span
                            class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Admin::where('group','admin')->count() }}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="active"><a class="menu-item"
                                href="{{ route('dashboard.' . $module_name . '.index') }}"
                                data-i18n="nav.dash.ecommerce">show all </a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.create') }}"
                                data-i18n="nav.dash.crypto">
                                add
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            {{-- ------------------------end nav item admins------------------------
            --}}
            {{-- ------------------------start nav item users------------------------
            --}}

            @php
            $module_name = 'users';
            @endphp
            <li class="nav-item isActive($module_name) }}">

                <a href=""><i class="la la-users"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{ ucfirst($module_name) }}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\User::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.index') }}"
                            data-i18n="nav.dash.ecommerce">show all </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.create') }}"
                            data-i18n="nav.dash.crypto">
                            add
                        </a>
                    </li>
                </ul>
            </li>

            {{-- ------------------------end nav item users------------------------
            --}}


            {{-- ------------------------start nav item
            categories--------------------------}}

            @php
            $module_name = 'categories';
            @endphp

            <li class="nav-item {{ isActive($module_name) }}">

                <a href=""><i class="la la-list"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{ ucfirst($module_name) }}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Category::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.index') }}"
                            data-i18n="nav.dash.ecommerce">show all </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.create') }}"
                            data-i18n="nav.dash.crypto">
                            add
                        </a>
                    </li>
                </ul>
            </li>


            {{-- ------------------------end nav item
            categories--------------------------}}






            {{-- ------------------------start nav item
            skills--------------------------}}

            @php
            $module_name = 'skills';
            @endphp

            <li class="nav-item {{ isActive($module_name) }}">

                <a href=""><i class="la la-magic"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{ ucfirst($module_name) }}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Skill::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.index') }}"
                            data-i18n="nav.dash.ecommerce">show all </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.create') }}"
                            data-i18n="nav.dash.crypto">
                            add
                        </a>
                    </li>
                </ul>
            </li>

            {{-- ------------------------end nav item
            skills--------------------------}}

            {{-- ------------------------start nav item
            tags--------------------------}}
            @php
            $module_name = 'tags';
            @endphp

            <li class="nav-item {{ isActive($module_name) }}">

                <a href=""><i class="la la-tags"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{ ucfirst($module_name) }}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Tag::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.index') }}"
                            data-i18n="nav.dash.ecommerce">show all </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.create') }}"
                            data-i18n="nav.dash.crypto">
                            add
                        </a>
                    </li>
                </ul>
            </li>

            {{-- ------------------------end nav item
            tags--------------------------}}

            {{-- ------------------------start nav item
            --------------------------}}

            @php
            $module_name = 'pages';
            @endphp

            <li class="nav-item {{ isActive($module_name) }}">

                <a href=""><i class="la la-tags"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{ ucfirst($module_name) }}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Page::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.index') }}"
                            data-i18n="nav.dash.ecommerce">show all </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.create') }}"
                            data-i18n="nav.dash.crypto">
                            add
                        </a>
                    </li>
                </ul>
            </li>
            {{-- ------------------------end nav item
            --------------------------}}

            {{-- ------------------------start nav item
            playlists--------------------------}}
            @php
            $module_name = 'playlists';
            @endphp

            <li class="nav-item {{ isActive($module_name) }}">

                <a href=""><i class="la la-youtube"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{ ucfirst($module_name) }}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Playlist::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.index') }}"
                            data-i18n="nav.dash.ecommerce">show all </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.create') }}"
                            data-i18n="nav.dash.crypto">
                            add
                        </a>
                    </li>
                </ul>
            </li>

            {{-- ------------------------end nav item
            playlists--------------------------}}
            {{-- ------------------------start nav item
            videos--------------------------}}
            @php
            $module_name = 'videos';
            @endphp

            <li class="nav-item {{ isActive($module_name) }}">

                <a href=""><i class="la la-youtube"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> {{ ucfirst($module_name) }}</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ App\Models\Video::count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.index') }}"
                            data-i18n="nav.dash.ecommerce">show all </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.' . $module_name . '.create') }}"
                            data-i18n="nav.dash.crypto">
                            add
                        </a>
                    </li>
                </ul>
            </li>

            {{-- ------------------------end nav item
            videos--------------------------}}

            {{-- ------------------------start nav item
            --------------------------}}
            {{-- ------------------------end nav item
            --------------------------}}




        </ul>
    </div>
</div>
