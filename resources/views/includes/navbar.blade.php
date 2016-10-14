<div class="container">
    <div class="row">
        <div id="sp-logo" class="col-xs-8 col-sm-4 col-md-3">
            <div class="sp-column ">
                <a class="logo" href="/">
                    <h1>
                        <img class="sp-default-logo" src="/assets/logo.png" alt="droidtronix">
                        <img class="sp-retina-logo" src="/assets/logo@2x.png" alt="droidtronix" width="200" height="20">
                    </h1>
                </a>
            </div>
        </div>
        <div id="sp-menu" class="col-xs-4 col-sm-8 col-md-9" style="position: static;">
            <div class="sp-column ">
                <ul class="menu-account">
                    @if(Auth::check())
                        <li class="account-info">
                            <a class="account-name" href="#">
                                <img class="avatar" src="{{ Auth::user()->hasAvatar() ? '/uploads/avatars/' . Auth::user()->avatar : '/img/user.png' }}" alt="shamilchoudhury"><span class="hidden-xs">{{ Auth::user()->getNameOrUsername() }} <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="my-account">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}">
                                        <i class="fa fa-dashboard fa-fw"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" >
                                        <i class="fa fa-external-link fa-fw"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="account-login">
                            <a class="btn btn-primary btn-md btn-login hidden-sm hidden-xs" href="/login">Login</a>
                        </li>
                    @endif
                </ul>
                <div class="sp-megamenu-wrapper">
                    <a id="offcanvas-toggler" class="visible-xs" href="#"><i class="fa fa-bars"></i></a>
                    <ul class="sp-megamenu-parent menu-fade hidden-xs">
                        <li class="sp-menu-item">
                            <a href="/blog">Home</a>
                        </li>
                        <li class="sp-menu-item sp-has-child">
                            <a href="#">Categories</a>
                            <div class="sp-dropdown sp-dropdown-main sp-dropdown-mega sp-menu-right" style="width: 280px;">
                                <div class="sp-dropdown-inner">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="sp-mega-group">
                                                <li class="sp-menu-item sp-has-child">
                                                    <ul class="sp-mega-group-child sp-dropdown-items">
                                                        @if($cats->count())
                                                            @foreach($cats as $cat)
                                                                <li class="sp-menu-item">
                                                                    <a href="{{ route('category.show', $cat->slug) }}">
                                                                        {{ $cat->name }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li class="sp-menu-item">
                                                                <a href="#">
                                                                    NO Categories Listed Yet
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="sp-menu-item sp-has-child">
                            <a href="#"><i class="fa fa-share-alt"></i> </a>
                            <div class="sp-dropdown sp-dropdown-main sp-dropdown-mega sp-menu-right" style="width: 180px;">
                                <div class="sp-dropdown-inner">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="sp-mega-group">
                                                <li class="sp-menu-item sp-has-child">
                                                    <ul class="sp-mega-group-child sp-dropdown-items">
                                                        <li class="sp-menu-item">
                                                            <a target="_blank" href="https://www.facebook.com/droidtronix"><i class="fa fa-facebook-official"></i> Facebook</a>
                                                        </li>
                                                        <li class="sp-menu-item">
                                                            <a target="_blank" href="https://twitter.com/droidtronix"><i class="fa fa-twitter-square"></i> Twitter</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
