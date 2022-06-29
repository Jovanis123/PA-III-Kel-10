<!DOCTYPE html>
<html>
    <head>
        <title>SMAN 1 Habinsaran - @yield('title')</title>
        @include('partials.dashHead')
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    </head>

    <body>
        <div class="wrapper">
            @include('partials.dashNavbar')

            <!-- Checking Role For Sidebar -->
            @if(Auth::user()->hasRole("Admin"))
                @include('partials.okemin.dashSidebar')
            @elseif(Auth::user()->hasRole("Teacher"))
                @include('partials.teacher.dashSidebar')
            @else
                @include('partials.student.dashSidebar')
            @endif

            <div class="content-wrapper">
                <!-- This Line is For Breadcrumb -->
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- End of Main content -->
            </div>
            @include('partials.dashFooter')
        </div>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor 4
            // instance, using default configuration.
            CKEDITOR.replace( 'deskripsi' );
        </script>
    </body>
</html>

