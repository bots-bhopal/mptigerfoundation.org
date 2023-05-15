<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @if (session('locale') == 'en')
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{asset('public/assets/images/side-logo.png')}}" alt="MPTFS Logo" class="brand-image img-circle" style="opacity: .8">
            @if (Request::is('admin*'))
                <span class="brand-text font-weight-light">Super Admin Portal</span>
            @endif

            @if (Request::is('author*'))
                <span class="brand-text font-weight-light">Author Blog Portal</span>
            @endif

            @if (Request::is('user*'))
                <span class="brand-text font-weight-light">Admin Portal</span>
            @endif
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">MAIN NAVIGATION</li>
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    @if (Request::is('admin*'))
                        <li class="nav-item">
                            <a href="{{route('admin.dashboard')}}" class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}" class="nav-link {{Request::is('admin/category*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Category
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.download-category.index')}}" class="nav-link {{Request::is('admin/download-category*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Downloads Category
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.post.index')}}" class="nav-link {{Request::is('admin/post*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Post
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.post.pending')}}" class="nav-link {{Request::is('admin/pending/post') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-file-powerpoint"></i>
                            <p>
                                Pending Posts
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.author.index')}}" class="nav-link {{Request::is('admin/authors') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Authors
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">ADMIN SYSTEM</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Admin Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.user.list')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin Lists</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">SUPER ADMIN SYSTEM</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Super Admin Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.profile')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.changePassword')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif

                    @if (Request::is('author*'))
                        <li class="nav-item">
                            <a href="{{route('author.dashboard')}}" class="nav-link {{Request::is('author/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('author.post.index')}}" class="nav-link {{Request::is('author/post*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                Post
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">SYSTEM</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('author.profile')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('author.changePassword')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif

                    @if (Request::is('user*'))
                        <li class="nav-item">
                            <a href="{{route('user.dashboard')}}" class="nav-link {{Request::is('user/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                            </a>
                        </li>

                        {{-- <li class="nav-header">NEWS</li>
                        <li class="nav-item">
                            <a href="{{route('user.news.index')}}" class="nav-link {{Request::is('user/news*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Latest News
                            </p>
                            </a>
                        </li> --}}

                        <li class="nav-header">MILESTONES</li>
                        <li class="nav-item">
                            <a href="{{route('user.milestone.index')}}" class="nav-link {{Request::is('user/milestone*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Milestone
                            </p>
                            </a>
                        </li>

                        <li class="nav-header">EVENTS</li>
                        <li class="nav-item">
                            <a href="{{route('user.event.index')}}" class="nav-link {{Request::is('user/event*') ? 'active' : ''}}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Latest Events
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">AWARENESS INITIATIVES</li>
                        <li class="nav-item">
                            <a href="{{route('user.awareness.index')}}" class="nav-link {{Request::is('user/awareness*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-universal-access"></i>
                            <p>
                                Awareness Initiatives
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">GALLERY SYSTEM</li>
                        <li class="nav-item">
                            <a href="{{route('user.images')}}" class="nav-link {{Request::is('user/images') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-upload"></i>
                            <p>
                                Upload Gallery
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.images-show')}}" class="nav-link {{Request::is('user/images-show') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                View Gallery
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">DOWNLOADS SYSTEM</li>
                        <li class="nav-item">
                            <a href="{{route('user.posters')}}" class="nav-link {{Request::is('user/posters') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-upload"></i>
                            <p>
                                Upload Poster
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.posters-show')}}" class="nav-link {{Request::is('user/posters-show') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                View Poster
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">ADMIN SYSTEM</li>
                        <li class="nav-item {{ ('user/profile' == request()->path() || 'user/changePassword' == request()->path()) ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('user.profile')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Profile</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.changePassword')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    @endif

    @if (session('locale') == 'hi')
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{asset('public/assets/images/side-logo.png')}}" alt="MPTFS Logo" class="brand-image img-circle" style="opacity: .8">
            @if (Request::is('admin*'))
                <span class="brand-text font-weight-light">सुपर एडमिन पोर्टल</span>
            @endif

            @if (Request::is('author*'))
                <span class="brand-text font-weight-light">ऑथर ब्लॉग पोर्टल</span>
            @endif

            @if (Request::is('user*'))
                <span class="brand-text font-weight-light">एडमिन पोर्टल</span>
            @endif
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">मुख्य नेविगेशन</li>
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    @if (Request::is('admin*'))
                        <li class="nav-item">
                            <a href="{{route('admin.dashboard')}}" class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                डैशबोर्ड
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}" class="nav-link {{Request::is('admin/category*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                केटेगरी
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.post.index')}}" class="nav-link {{Request::is('admin/post*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                पोस्ट
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.post.pending')}}" class="nav-link {{Request::is('admin/pending/post') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-file-powerpoint"></i>
                            <p>
                                पेन्डिंग पोस्ट
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.author.index')}}" class="nav-link {{Request::is('admin/authors') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                ऑथर्स
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">एडमिन सिस्टम</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                एडमिन सेटिंग्स
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.user.list')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>एडमिन लिस्ट</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header">सुपर एडमिन सिस्टम</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                सुपर एडमिन सेटिंग्स
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.profile')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>यूजर प्रोफाइल</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.changePassword')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>चेंज पासवर्ड</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                लॉगआउट
                            </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif

                    @if (Request::is('author*'))
                        <li class="nav-item">
                            <a href="{{route('author.dashboard')}}" class="nav-link {{Request::is('author/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                डैशबोर्ड
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('author.post.index')}}" class="nav-link {{Request::is('author/post*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                पोस्ट
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">सिस्टम</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                सेटिंग्स
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('author.profile')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>यूजर प्रोफाइल</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('author.changePassword')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>चेंज पासवर्ड</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                लॉगआउट
                            </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif

                    @if (Request::is('user*'))
                        <li class="nav-item">
                            <a href="{{route('user.dashboard')}}" class="nav-link {{Request::is('user/dashboard') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                डैशबोर्ड
                            </p>
                            </a>
                        </li>
                        {{-- <li class="nav-header">NEWS</li>
                        <li class="nav-item">
                            <a href="{{route('user.news.index')}}" class="nav-link {{Request::is('user/news*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                लेटेस्ट न्यूज़
                            </p>
                            </a>
                        </li> --}}

                        <li class="nav-header">माइलस्टोन</li>
                        <li class="nav-item">
                            <a href="{{route('user.milestone.index')}}" class="nav-link {{Request::is('user/milestone*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                माइलस्टोन
                            </p>
                            </a>
                        </li>

                        <li class="nav-header">इवेंट्स</li>
                        <li class="nav-item">
                            <a href="{{route('user.event.index')}}" class="nav-link {{Request::is('user/event*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                लेटेस्ट इवेंट्स
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">जागरूकता की पहल</li>
                        <li class="nav-item">
                            <a href="{{route('user.awareness.index')}}" class="nav-link {{Request::is('user/awareness-initiative*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-universal-access"></i>
                            <p>
                                जागरूकता की पहल
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">गैलरी सिस्टम</li>
                        <li class="nav-item">
                            <a href="{{route('user.images')}}" class="nav-link {{Request::is('user/images') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-upload"></i>
                            <p>
                                अपलोड गैलरी
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.images-show')}}" class="nav-link {{Request::is('user/images-show') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                व्यू गैलरी
                            </p>
                            </a>
                        </li>
                        <li class="nav-header">सिस्टम</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                सेटिंग्स
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('user.profile')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>यूजर प्रोफाइल</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('user.changePassword')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>चेंज पासवर्ड</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                लॉगआउट
                            </p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    @endif

</aside>
