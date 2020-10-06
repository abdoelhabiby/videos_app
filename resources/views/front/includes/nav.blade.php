 <nav class="navbar navbar-expand-lg fixed-top navbar-transparent "
     color-on-scroll="{{ request()->url() == route('welcome') ? '150' : '-1' }}">
     <div class="container">
         <div class="navbar-translate d-flex">
             <a class="navbar-brand" href="{{ route('welcome') }}" rel="tooltip" data-placement="bottom">
                 Videos App v1
             </a>

             <div class="form-search mt-1">
                 <form action="{{route('front.playlist_video.search')}}" method="get" class="d-flex">
                     <input type="text" name="search" value="{{trim(request()->search)}}" placeholder="search.." class="form-control" style="margin-top: 13px;height:34px">

                     <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-search"></i></button>

                 </form>
             </div>

             <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse"
                 data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <span class="navbar-toggler-bar bar1"></span>
                 <span class="navbar-toggler-bar bar2"></span>
                 <span class="navbar-toggler-bar bar3"></span>
             </button>
         </div>
         <div class="collapse navbar-collapse justify-content-end" id="navigation">
             <ul class="navbar-nav">

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
                                 {{ auth()->user()->name }}
                             </a>
                             <div class="dropdown-menu">
                                 <a href="{{ route('front.profile', [user()->id, pageNameReplaceespace(user()->name)]) }}" class="dropdown-item">Profile</a>

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
