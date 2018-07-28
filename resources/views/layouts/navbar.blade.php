<div class="header">
    <div class="header-left">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" width="40" height="40" alt="">
        </a>
    </div>
    <div class="page-title-box pull-left">
        <h3>theGround</h3>
    </div>
    @auth
        <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars"
                                                                           aria-hidden="true"></i></a>
    @endauth
    <ul class="nav navbar-nav navbar-right user-menu pull-right">
        @auth
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span
                            class="badge bg-primary pull-right">3</span></a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span>Notifications</span>
                    </div>
                    <div class="drop-scroll">
                        <ul class="media-list">
                            <li class="media notification-message">
                                <a href="#">
                                    <div class="media-left">
                                            <span class="avatar">
												<img alt="John Doe" src="{{ asset('img/user.jpg') }}"
                                                     class="img-responsive img-circle">
											</span>
                                    </div>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">John Doe</span> added new task
                                            <span class="noti-title">Patient appointment booking</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>
            <li class="dropdown hidden-xs">
                <a href="javascript:;" id="open_msg_box" class="hasnotifications"><i class="fa fa-comment-o"></i> <span
                            class="badge bg-primary pull-right">8</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                        <span class="user-img"><img class="img-circle" src="{{ asset('img/user.jpg') }}" width="40"
                                                    alt="Admin">
							<span class="status online"></span></span>
                    <span>{{ $user->name }}</span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu">
                    @can('index',\App\Company::class)
                    <li><a href="{{ route('home') }}">Companies</a></li>
                    @endcan
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            @else
                <li><a href="{{ route('login') }}">login</a></li>
                <li><a href="{{ route('register') }}">register</a></li>
        @endauth
    </ul>
    <div class="dropdown mobile-user-menu pull-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-ellipsis-v"></i></a>
        <ul class="dropdown-menu pull-right">
            @auth
                <li><a href="{{ route('home') }}">companies</a></li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                    <li><a href="{{ route('login') }}">login</a></li>
                    <li><a href="{{ route('register') }}">register</a></li>
            @endauth
        </ul>
    </div>
</div>