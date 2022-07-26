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
                <img src="{{ asset('storage/avatars/' . $user->avatar) }}" height="72px" width="72px" 
class="img-circle elevation-2" alt="User Image">
            @else
                <img src="{{ asset('static/avatar/img1.jpg') }}" class="img-circle elevation-2"  height="72px" width="72px" alt="User 
Image">
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
                    <a href="{{ url('/Student')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                        Dashboard
                        </p>
                    </a>
                </li>
               <li class="nav-item">
                    <a href="{{ url('/Student/Pengumuman')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                        Pengumuman
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/Student/Quiz')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                        Quiz
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
                            <a href="{{ url('/Student/Profile/')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Student/Profile/Picture')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Profile Picture</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                        Materi
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Student/Materi/Mapel')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lihat Materi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                        Tugas
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('student.tugas.mapel') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lihat Tugas</p>
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
