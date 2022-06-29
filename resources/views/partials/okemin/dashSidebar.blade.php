<aside class="main-sidebar sidebar-light-primary shadow">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dash/dist/img/LaraELearn-LOGO.png') }}"
           alt="Logo"
           class="brand-image img-circle "
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMAN 1 Habinsaran</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user (optional) -->
      <div class="mt-3 pb-3 mb-3">
        <div class="image text-center p-5">
            @if($user->avatar)
                <img src="{{asset('/storage/avatars')}}/{{ $user->avatar }}" height="72px" width="72px" class="img-circle elevation-2" alt="User Image">
            @else
                <img src="{{ asset('/storage/avatars/defaultAvatar.png') }}" class="img-circle elevation-2" alt="User Image">
            @endif
            <div class="info mt-4">
              <a href="/Okemin/Profile" class="d-block font-weight-bold">{{ $user->name }}</a>
              <a class="d-block text-muted">{{ $user->jabatan }}</a>
            </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                    <a href="{{ url('/Okemin')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                        Dashboard
                        </p>
                    </a>
                </li>
               <li class="nav-item">
                    <a href="{{ url('/Okemin/Pengumuman')}}" class="nav-link">
                        <i class="nav-icon fas fa-volume-high"></i>
                        <p>
                        Pengumuman
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                        Profile
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/Profile/')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/Profile/Picture')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Profile Picture</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                        User Manager
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/User/Student/List')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student Manager</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/User/Student/Create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/User/Teacher/List')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teacher Manager</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/User/Teacher/Create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Teacher</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                        Kelas
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/Kelas/Create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Kelas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/Kelas/List')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Kelas</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                        Mata Pelajaran
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/Mapel/Create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Mata Pelajaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Okemin/Mapel/List')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Mata Pelajaran</p>
                            </a>
                        </li>
                    </ul>
                </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
