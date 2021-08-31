  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.admin') }}" class="brand-link">
      <img src="{{ asset('admin/image/AdminLTELogo.png') }}" 
      alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
      <span class="brand-text font-weight-light">Daily Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/image/user2-160x160.jpg') }}" 
          class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucfirst(Auth::user()->name ??  '') }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"  data-accordion="false">
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard.admin') }}" class="nav-link active">
                Home
            </a>
          </li>
          <li class="nav-header" style="font-weight:bold">
            Posts Section
          </li>
          {{-- posts --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                 <p>
                  Post
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('posts.index') }}" class="nav-link">
                    <p style="margin-left: 5px;">
                      <i class="fas fa-mail-bulk" style="margin-right: 5px;"></i>
                       Create
                    </p>
                  </a>
                </li>
            </ul>
          </li>
          {{-- tags --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-tags"></i>
                 <p>
                  Tags
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                  <a href="{{ route('tags.index') }}" class="nav-link">
                    <p style="margin-left: 5px;">
                      <i class="fas fa-hashtag" style="margin-right: 5px;"></i>
                       List of Tags
                    </p>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="{{ route('tags.create') }}" class="nav-link">
                    <p style="margin-left: 5px;">
                      <i class="fas fa-hashtag" style="margin-right: 5px;"></i>
                       Create
                    </p>
                  </a>
                </li>

                
            </ul>
          </li>

          {{-- categories --}}
           <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-search-location"></i>
                 <p>
                  Category
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
               {{-- all categories --}}
                <li class="nav-item">
                  <a href="{{ route('categories.index') }}" class="nav-link">
                    <p style="margin-left: 5px;">
                      <i class="fas fa-search" style="margin-right: 5px;"></i>
                       Categories
                    </p>
                  </a>
                </li>
                {{-- =============== --}}
                <li class="nav-item">
                  <a href="{{ route('categories.create') }}" class="nav-link">
                    <p style="margin-left: 5px;">
                      <i class="fas fa-search" style="margin-right: 5px;"></i>
                       Create
                    </p>
                  </a>
                </li>
               
            </ul>
          </li>
          {{-- logout --}}
          <li class="nav-item bg-danger" style="border-radius: 5px;">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt text-white"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
          </form>
         </li>
       </ul>
       {{-- end logout --}}
      </nav>
    </div>
  </aside>