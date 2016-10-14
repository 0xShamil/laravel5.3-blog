<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->hasAvatar() ? '/uploads/avatars/' . Auth::user()->avatar : '/img/user.png' }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->getNameOrUsername() }}</p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="active treeview">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>
            @can('create', App\Models\Post::class)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-list"></i>
                        <span>Posts</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('manage-posts')
                            <li><a href="{{ route('admin.posts') }}"><i class="fa fa-sticky-note-o"></i> All Posts</a></li>
                        @endcan
                        <li><a href="{{ route('admin.posts.user', Auth::user()->username) }}"><i class="fa fa-file-text-o"></i> My Posts</a></li>
                        <li><a href="{{ route('admin.posts.create') }}"><i class="fa fa-pencil-square-o"></i> Create Post</a></li>

                    </ul>
                </li>
            @endcan
            <li class="treeview">
                <a href="{{ route('admin.categories') }}">
                    <i class="fa fa-th-large"></i>
                    <span>Categories</span>
                </a>
            </li>
            @can('manage-users')
                <li class="treeview">
                    <a href="{{ route('admin.users') }}">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            @endcan

            @can('manage-inbox')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('admin.mailbox') }}">Inbox
                                <span class="pull-right-container">
                                    <span class="label label-primary pull-right">{{ App\Models\Message::getUnreadCount() }}</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan

            <li class="header">Settings</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i> <span>Profile Settings</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.user.profile', Auth::user()->username) }}"><i class="fa fa-eye"></i> View Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.edit', Auth::user()->username) }}"><i class="fa fa-wrench"></i> Edit Profile</a>
                    </li>
                </ul>
            </li>

            @can('manage-settings')
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i> <span>Blog Settings</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('admin.settings.index') }}"><i class="fa fa-cog"></i> View Settings
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings.edit') }}"><i class="fa fa-wrench"></i> Edit Settings
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </section>
</aside>
