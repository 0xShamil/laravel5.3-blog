<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ Auth::user()->hasAvatar() ? '/uploads/avatars/' . Auth::user()->avatar : '/img/user.png' }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->getNameorUsername() }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{ Auth::user()->hasAvatar() ? '/uploads/avatars/' . Auth::user()->avatar : '/img/user.png' }}" class="img-circle" alt="User Image">

                        <p>
                        {{ Auth::user()->getNameorUsername() }}
                        <small>Administrator</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ route('admin.user.profile', Auth::user()->username) }}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" >Sign out</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
