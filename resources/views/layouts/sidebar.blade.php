  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="opacity: 0.9">
    <!-- Brand Logo -->
    <a href="/" class="logo-das brand-link text-decoration-none bg-dark">
      {{-- <img src="{{ asset('images/sewmo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light text-decoration-none">Gallery</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-dark" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->image)
            <img src="{{ asset('/storage/images/user/' . Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
          @else
            <img  src="{{ asset('images/Default.svg.png') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{ route('profile') }}" class="d-block text-decoration-none">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active bg-light' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link {{ Route::is('profile') ? 'active bg-light' : '' }}">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          @if(Auth::user()->role != 'user')
          <li class="nav-item">
            <a href="{{ route('users') }}" class="nav-link {{ Route::is('users') ? 'active bg-light' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
                {{-- <span class="badge badge-danger right">New</span> --}}
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('post.index') }}" class="nav-link {{ Route::is('post.index') ? 'active bg-light' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Postingan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('category.index') }}" class="nav-link {{ Route::is('category.index') ? 'active bg-light' : '' }}">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tag.index') }}" class="nav-link {{ Route::is('tag.index') ? 'active bg-light' : '' }}">
              <i class="nav-icon fas fa-hashtag"></i>
              <p>
                Tags
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ route('post-saves.show') }}" class="nav-link {{ Route::is('post-saves.show') ? 'active bg-dark' : '' }}">
              <i class="nav-icon fas fa-save"></i>
              <p>
                Save Post
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('post-saves.show',['post' => auth()->user()->id ]) }}" class="nav-link {{ Route::is('post-saves.show') ? 'active bg-light' : '' }}">
              <i class="nav-icon fas fa-bookmark"></i>
                <p style="margin-left: 10px;">
                    Saved Post
                </p>
            </a>
          {{-- </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Dropdown
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>--</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>--</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>--</p>
                </a>
              </li>
            </ul>
          </li> --}}
          {{-- <li class="nav-header">MENU ADMIN</li> --}}
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  