  <header class="main-header">
    <!-- Logo -->
    <a href="{{ URL::Route('index') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Muntinlupa</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img width="50" height="50" src="{{env('FILE_PATH_CUSTOM')}}img/logo2.png"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @include('includes.userMenu')
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>