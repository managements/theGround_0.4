@auth
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Main</li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-columns" aria-hidden="true"></i> <span>Pages</span> <span
                                    class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                            <li><a href="{{ route('home') }}">Home </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endauth