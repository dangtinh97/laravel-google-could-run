<aside class="main-sidebar sidebar-dark-success elevation-4">
    {{--    <!-- Brand Logo -->--}}
    <a href="/" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Laravel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">ChienDV</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link
                          @if (Route::currentRouteName() == 'dashboard' )
                    {{'active'}}
                    @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('permission_index')
                    <li class="nav-item has-treeview">
                        <a href="{{route('permission.index')}}"
                           class="
                       nav-link
                       @if (
                                     Route::currentRouteName() == 'permission.index' ||
                                     Route::currentRouteName() ==  'permission.create' ||
                                     Route::currentRouteName() ==  'permission.edit')
                           {{'active'}}
                           @endif">
                            <i class="nav-item fa fa-rss"></i>
                            <p>{{__('Permission')}}</p>
                        </a>
                    </li>
                @endcan

                @can('role_index')
                    <li class="nav-item has-treeview">
                        <a href="{{route('role.index')}}"
                           class="
                       nav-link
                       @if (
                                     Route::currentRouteName() == 'role.index' ||
                                     Route::currentRouteName() ==  'role.create' ||
                                     Route::currentRouteName() ==  'role.edit')
                           {{'active'}}
                           @endif">

                            <i class="nav-item fab fa-gg-circle"></i>
                            <p>{{__('Roles')}}</p>
                        </a>
                    </li>
                @endcan

                @can('user_index')

                    <li class="nav-item has-treeview">
                        <a href="{{route('user.index')}}"
                           class="
                       nav-link
                       @if (
                                     Route::currentRouteName() == 'user.index' ||
                                     Route::currentRouteName() ==  'user.create' ||
                                     Route::currentRouteName() ==  'user.edit')
                           {{'active'}}
                           @endif"
                        >
                            <i class="nav-item fa fa-users" aria-hidden="true"></i>
                            <p>{{__('Users')}}</p>
                        </a>
                    </li>
                @endcan
                @can('category_index')

                    <li class="nav-item has-treeview">
                        <a href="{{route('category.index')}}"
                           class="
                       nav-link
                       @if (
                                     Route::currentRouteName() == 'category.index' ||
                                     Route::currentRouteName() ==  'category.create' ||
                                     Route::currentRouteName() ==  'category.edit')
                           {{'active'}}
                           @endif">
                            {{--                            <i class="nav-item fas fa-id-card-alt"></i>--}}
                            <i class="nav-item fab fa-buffer"></i>
                            <p>{{__('Category')}}</p>
                        </a>
                    </li>
                @endcan

                @can('banner_index')
                    <li class="nav-item has-treeview">
                        <a href="{{route('banner.index')}}"
                           class="nav-link @if (
                                     Route::currentRouteName() == 'banner.index' ||
                                     Route::currentRouteName() == 'banner.create' ||
                                     Route::currentRouteName() == 'banner.edit')
                           {{'active'}}
                           @endif"
                        >
                            <i class="nav-item far fa-images"></i>
                            <p>{{__('Banner')}}</p>
                        </a>
                    </li>
                @endcan

                <li class="nav-item has-treeview">
                    <a href=""
                       class="nav-link"
                    >
                        <i class="nav-item fas fa-cog"></i>
                        <p>{{__('Setting')}}</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>{{__('Logout')}}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
